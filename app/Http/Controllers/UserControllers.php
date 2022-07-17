<?php

namespace App\Http\Controllers;

use App\Http\Models\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserControllers
 * @package App\Http\Controllers
 */
class UserControllers extends Controller
{

    /**
     * list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getList(Request $request)
    {
        $cond = $request->json()->all();
        $ret  = UserModel::getListPaging($cond);
        return response()->json([
            'ret'     => 0,
            'errcode' => 0,
            'msg'     => 'success',
            'data'    => $ret
        ])->withHeaders([
            'Access-Control-Allow-Origin' => '*'
        ]);
    }


    /**
     *
     * detail
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(Request $request)
    {
        $id = $request->json()->get('id');

        $ret = UserModel::getDetailById($id);

        return response()->json([
            'ret'     => 0,
            'errcode' => 0,
            'msg'     => 'success',
            'data'    => $ret
        ])->withHeaders([
            'Access-Control-Allow-Origin' => '*'
        ]);
    }

    /**
     * save
     *
     * @param Request $request
     */
    public function save(Request $request)
    {
        $params = $request->json()->all();

        $ret = UserModel::handleSave($params);

        return response()->json([
            'ret'     => 0,
            'errcode' => 0,
            'msg'     => 'success',
            'data'    => $ret
        ])->withHeaders([
            'Access-Control-Allow-Origin' => '*'
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $id = $request->json()->get('id');

        $ret = UserModel::deleteById($id);

        return response()->json([
            'ret'     => 0,
            'errcode' => 0,
            'msg'     => 'success',
            'data'    => $ret
        ])->withHeaders([
            'Access-Control-Allow-Origin' => '*'
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function batchDelete(Request $request)
    {
        $ids = $request->json()->get('ids');

        $ret = UserModel::batchDelete($ids);

        return response()->json([
            'ret'     => 0,
            'errcode' => 0,
            'msg'     => 'success',
            'data'    => $ret
        ])->withHeaders([
            'Access-Control-Allow-Origin' => '*'
        ]);
    }


}
