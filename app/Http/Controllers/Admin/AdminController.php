<?php

namespace App\Http\Controllers\Admin;

use File;
use Carbon\Carbon;
use App\Models\LoginTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    public function loginHistory()
    {
        return view('admin.logs.admin_login_history');
    }

    public function tuStatusLog(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("select dsl.*, pus.name as ps_name, pus.status_color as p_status_color, cus.name as cs_name, cus.status_color as c_status_color, gs.device_name, gs.imei, gs.sim_number, gs.customer_id, c.customer_name from device_status_log dsl left join unit_status  pus on pus.id = dsl.previous_status left join unit_status cus on cus.id = dsl.current_status left join gs_objects gs  on gs.id = dsl.device_id left join customers c on c.id = gs.customer_id");
            return Datatables::of($data)
                // ->addColumn('checkDevice', function ($row) {
                //     $device_id = $row->id;
                //     return 'value=' . $device_id . ' data-rel=' . $row->imei;
                // })
                ->addIndexColumn()
                ->editColumn('previous_status', function ($row) {
                    $ps = "<span class='badge badge-pill' style='background-color:" . $row->p_status_color . ";'>" . $row->ps_name . "</span>";
                    return $ps;
                })
                ->editColumn('current_status', function ($row) {
                    $cs = "<span class='badge badge-pill' style='background-color:" . $row->c_status_color . ";'>" . $row->cs_name . "</span>";
                    return $cs;
                })
                ->editColumn('previous_status_date', function ($row) {
                    $PSDate = Carbon::parse($row->previous_status_date)->format('d M Y, h:i a');
                    return $PSDate;
                })
                ->editColumn('last_update', function ($row) {

                    $startTime = Carbon::parse(time());
                    $endTime = Carbon::parse($row->last_update);
                    $totalDuration = $startTime->diff($endTime)->format('%d') . " Days Ago";

                    return $totalDuration;
                })
                ->addColumn('action', function ($row) {
                    $id = $row->device_id;
                    return
                        "<button style=' type='button' class='custom-button-class mr-2' data-toggle='modal' data-target='#imeiModal' onclick='view_data($id)'><i class='fas fa-eye'></i></button>";
                })
                ->rawColumns(['previous_status', 'current_status', 'previous_status_date', 'last_update', 'action'])
                ->make(true);
        }
        return view('admin.logs.tu_status_log');
    }

    public function system_config()
    {
        $data['system_config'] = DB::select("select sc.*, lt.template_name, lt.template_preview from system_config sc left join login_templates lt on lt.id = sc.login_template_id where sc.id = 1")[0];
        $data['templates'] = LoginTemplate::get();

        return view('admin.ui_ux.system_config')->with($data);
    }

    public function menu_config()
    {
        $menu = DB::table("settings")->where("meta_key", "menu_item")->get()[0];
        $menuArr = json_decode($menu->meta_value);
        $final_menu = '<ul id="myList" class="sortableLists list-group"></ul>';
        if ($menuArr) {
            $final_menu = $this->parseNodes($menuArr);
        }

        $data['menu'] = $final_menu;

        return view('admin.ui_ux.menu_config')->with($data);
    }

    public function parseNodes($nodes)
    { // takes a nodes array and turns it into a <ol>
        $ol = '<ul id="myList" class="sortableLists list-group">';
        for ($i = 0; $i < count($nodes); $i++) {
            //ol.appendChild(parseNode(nodes[i]));
            $ol .= $this->parseNode($nodes[$i]);
        }
        $ol .= '</ul>';
        return $ol;
    }

    public function parseNode($node)
    { // takes a node object and turns it into a <li>
        $li = '<li class="list-group-item" data-href="' . $node->href . '" data-module_id="' . $node->module_id . '"  data-target="' . $node->target . '" data-icons="' . $node->icons . '" data-status="' . $node->status . '" data-text="' . $node->text . '"> <div> <i class="' . $node->icons . '"></i> <span class="txt">' . $node->text . '</span> <div class="btn-group pull-right"> <a href="javascript:;" class="btn btn-brand btn-sm btnEdit">Edit</a></div></div>';
        //li.innerHTML = node.title;
        //li.className = node.class;
        if (isset($node->children)) {
            $li .= $this->parseNodes($node->children);
        }
        $li .= '</li>';
        return $li;
    }

    public function update_system_config(Request $request, $type)
    {
        try {
            $image = '';
            $system_config = DB::table('system_config')->find(1);

            if ($type == "light_logo") {
                $image = $request->file('light_logo');
                $oldImg = $system_config->light_logo;

                $validator = Validator::make($request->all(), [
                    'light_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            } else if ($type == "dark_logo") {
                $image = $request->file('dark_logo');
                $oldImg = $system_config->dark_logo;

                $validator = Validator::make($request->all(), [
                    'dark_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                ]);
            } else if ($type == "favicon") {
                $image = $request->file('favicon');
                $oldImg = $system_config->favicon;

                $validator = Validator::make($request->all(), [
                    'favicon' => 'required|mimes:jpeg,png,jpg,gif,ico',
                ]);
            } else if ($type == "login_bg") {
                $image = $request->file('login_page_background');
                $oldImg = $system_config->login_bg;

                $validator = Validator::make($request->all(), [
                    'login_page_background' => 'required|mimes:jpeg,png,jpg,gif,ico',
                ]);
            } else if ($type == "login_logo") {
                $image = $request->file('login_page_logo');
                $oldImg = $system_config->login_page_logo;

                $validator = Validator::make($request->all(), [
                    'login_page_logo' => 'required|mimes:jpeg,png,jpg,gif,ico',
                ]);
            } else if ($type == "titles") {

                $validator = Validator::make($request->all(), [
                    'login_page_heading' => 'required',
                    'admin_title' => 'required',
                    'customer_title' => 'required',
                ]);
            } else if ($type == "template") {

                $validator = Validator::make($request->all(), [
                    'login_template' => 'required',
                ]);
            }

            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            DB::beginTransaction();

            if ($image != null && $type != 'titles' && $type != 'template') {
                $imgName = $type . "_" . date("Ymd_His");
                $ext = strtolower($image->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/system_config/';
                $uploadTo = $image->move($uploadPath, $fullName);
                $image_path = $uploadPath . $oldImg;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                if ($type == "light_logo") {
                    $insert = ['light_logo' => $fullName];
                } else if ($type == "dark_logo") {
                    $insert = ['dark_logo' => $fullName];
                } else if ($type == "favicon") {
                    $insert = ['favicon' => $fullName];
                } else if ($type == "login_bg") {
                    $insert = ['login_bg' => $fullName];
                } else if ($type == "login_logo") {
                    $insert = ['login_page_logo' => $fullName];
                }
            } else {
                if ($type == "titles") {
                    $insert = [
                        'admin_title' => $request->admin_title,
                        'customer_title' => $request->customer_title
                    ];
                } else if ($type == "template") {
                    $insert = ['login_template_id' => $request->login_template];
                }
            }
            $update = DB::table('system_config')->where('id', 1)->update($insert);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function menu_config_update(Request $request)
    {
        try {
            $menu_list = json_decode($request->menu_list);

            DB::beginTransaction();
            $update = DB::update("update settings set meta_value='" . $request->menu_list . "' where meta_key='menu_item'");

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function login_template(Request $request)
    {
        if ($request->ajax()) {

            $data = DB::select("select lt.*, sc.login_template_id from login_templates lt left join system_config sc on sc.login_template_id = lt.id order by lt.id desc");
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $id = $row->id;

                    return "<button style=' type='button' class='custom-button-class mr-2' onclick='view_data($id)'><i class='fas fa-eye'></i></button>

                    <button style=' type='button' class='custom-button-class mr-2' onclick='edit_data($id)'><i class='fas fa-edit'></i></button>";
                })
                ->editColumn('template_preview', function ($row) {
                    if ($row->template_preview) {
                        return $img = "<img  style='max-width:80px; height:48px;' src='" . url('public/uploads/system_config/' . $row->template_preview) . "' alt='Image'/>";
                    } else {
                        return $img = "<img  style='width:48px; height:48px; border-radius:50%' src='" . url('assets/media/users/default.jpg') . "' alt='Image'/>";
                    }
                })
                ->editColumn('status', function ($row) {
                    $id = $row->id;
                    if ($row->status == 1) {
                        return $status = "<span class= 'ml-2 badge badge-pill badge-success'>Active</span>";
                    } else {
                        return $status = "<span class= 'ml-2 badge badge-pill badge-warning'>Inactive</span>";
                    }
                })

                ->editColumn('login_template_id', function ($row) {
                    $id = $row->id;
                    if ($row->login_template_id != null) {
                        return $template = "<span class= 'ml-2 badge badge-pill badge-success'>Applied</span>";
                    } else {
                        return $template = "<a href='javascript:;' class= 'ml-2 badge badge-pill badge-warning' onclick='apply($id)'>Apply Now</a>";
                    }
                })
                ->rawColumns(['template_preview', 'status', 'login_template_id', 'action'])
                ->make(true);
        }

        return view('admin.ui_ux.login_template');
    }
    public function store_template(Request $request, $id)
    {
        try {
            if ($id > 0) {
                $validator = Validator::make($request->all(), [
                    'template_name' => 'required',
                    'template_slug' => ['required', Rule::unique('login_templates', 'template_slug')->ignore($id)],
                    'template_heading' => 'required',
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'template_name' => 'required',
                    'template_slug' => 'required|unique:login_templates,template_slug',
                    'template_heading' => 'required',
                    'template_preview' => 'required',
                    'template_background' => 'required',
                    'template_logo' => 'required',
                ]);
            }


            if ($validator->fails()) {
                return $this->respondInvalidRequest($validator->errors());
            }

            $preview = $request->file('template_preview');
            $background = $request->file('template_background');
            $logo = $request->file('template_logo');

            DB::beginTransaction();

            if ($id > 0) {
                $template = LoginTemplate::find($id);
                $previewOld = $template->template_preview;
                $bgOld = $template->template_bg;
                $logoOld = $template->template_logo;
            } else {
                $template = new LoginTemplate();
            }

            if ($preview) {
                $imgName = "preview_" . date("Ymd_His");
                $ext = strtolower($preview->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'uploads/system_config/';
                $uploadTo = $preview->move($uploadPath, $fullName);
                if ($id > 0) {
                    $image_path = $uploadPath . $previewOld;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $template->template_preview = $fullName;
            }

            if ($background) {
                $imgName = "background_" . date("Ymd_His");
                $ext = strtolower($background->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'public/uploads/system_config/';
                $uploadTo = $background->move($uploadPath, $fullName);
                if ($id > 0) {
                    $image_path = $uploadPath . $bgOld;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $template->template_bg = $fullName;
            }

            if ($logo) {
                $imgName = "logo_" . date("Ymd_His");
                $ext = strtolower($logo->getClientOriginalExtension());
                $fullName = $imgName . '.' . $ext;
                $uploadPath = 'uploads/system_config/';
                $uploadTo = $logo->move($uploadPath, $fullName);
                if ($id > 0) {
                    $image_path = $uploadPath . $logoOld;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                $template->template_logo = $fullName;
            }
            $template->template_name = $request->template_name;
            $template->template_slug = $request->template_slug;
            $template->template_heading = $request->template_heading;
            $template->status = $request->status;
            $template->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function single_login_template($id)
    {
        $template = LoginTemplate::find($id);
        return response()->json($template);
    }
}
