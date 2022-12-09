<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categaria;
use Illuminate\Support\Facades\DB;

class GestionController extends Controller
{
    public function setCategorias(Request $request){
        if($request->categoria != ""){
            $verificarCate =  $this->verificar($request->categoria);
            if(count($verificarCate) > 0){
                return response()->json([
                    'status' => 'stop',
                    'message' => '',
                ],200);
            }else{
                $result = $this->insertCategoria($request->categoria);
                if($result != ""){
                    return response()->json([
                        'status' => 'success',
                        'message' => '',
                        "data" =>  $this->listadoCategoria()
                    ],200);
                }else{
                    return response()->json([
                        'status' => 'error',
                        'message' => '',
                    ],200);
                }
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => '',
            ],200);
        }
    }

    public function agregarProducto(Request $request){
        $vector = [
            "nombre" => $request->nombre,
            "referencia" => $request->referencia,
            "precio" => $request->precio,
            "peso" => $request->peso,
            "categoria" => $request->categoria,
            "stock" => $request->cantidad,
            "estado" => 1,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ];
        $verificarProd =  $this->verificarProducto($request->nombre);
        if(count($verificarProd) > 0){
            return response()->json([
                'status' => 'stop',
                'message' => '',
            ],200);
        }else{
            $result = $this->insertProducto($vector);
            if($result != ""){
                return response()->json([
                    'status' => 'success',
                    'message' => '',
                    "data" =>  $this->listadoProducto()
                ],200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => '',
                ],200);
            }
        }
    }

    public function borrarProducto(Request $request){
        $verificarProd =  $this->verificarProductoId($request->id);
        if(count($verificarProd) > 0){
            $result = $this->borrar($request->id);
            if($result > 0){
                return response()->json([
                    'status' => 'success',
                    'message' => '',
                    "data" =>  $this->listadoProducto()
                ],200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => '',
                ],200);
            }
        }else{
            return response()->json([
                'status' => 'stop',
                'message' => '',
            ],200);
        }
    }

    public function editarProducto(Request $request){
        $verificarProd =  $this->verificarProductoId($request->id);
        $vector = [
            "nombre" => $request->nombre,
            "referencia" => $request->referencia,
            "precio" => $request->precio,
            "peso" => $request->peso,
            "categoria" => $request->categoria,
            "stock" => $request->cantidad,
            "estado" => 1,
            "updated_at" => date("Y-m-d H:i:s"),
            "created_at" => date("Y-m-d H:i:s")
        ];
        if(count($verificarProd) > 0){
            $result = $this->editar($request->id,$vector);
            if($result > 0){
                return response()->json([
                    'status' => 'success',
                    'message' => '',
                    "data" =>  $this->listadoProducto()
                ],200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => '',
                ],200);
            }
        }else{
            return response()->json([
                'status' => 'stop',
                'message' => '',
            ],200);
        }
    }

    public function comprarProducto(Request $request){
        $vector = [
            "idProducto" => $request->id,
            "nombre" => $request->nombre,
            "precio" => $request->precio,
            "stock" => $request->stock,
            "categoria" => $request->categoria,
            "estado" => 1,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ];
        $result = $this->insertVentas($vector);
        if($result > 0){
            $verificarProd =  $this->verificarProductoId($request->id);
            $restante = $verificarProd[0]->stock - $request->stock;
            if($restante == 0){
                $vector = [
                    "stock" => 0,
                    "estado" => 0,
                    "updated_at" => date("Y-m-d H:i:s"),
                ];
            }else{
                $vector = [
                    "stock" => $restante,
                    "updated_at" => date("Y-m-d H:i:s"),
                ];
            }
            $result = $this->editar($request->id,$vector);
            if($result > 0){
                return response()->json([
                    'status' => 'success',
                    'message' => '',
                    "data" => $this->listadoProducto()
                ],200);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => '',
                ],200);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => '',
            ],200);
        }
    }

    public function listarProductos(){
        return response()->json([
            "data" => $this->listadoProducto()
        ],200);
    }

    public function listarVentas(){
        return response()->json([
            "data" => $this->listadoVentas()
        ],200);
    }

    public function listarCategoria(){
        return response()->json([
            "data" => $this->listadoCategoria()
        ],200);
    }

    public function countListadoProducto(){
        return response()->json([
            "data" => $this->stocklistado()
        ],200);
    }

    public function countListadoVentas(){
        return response()->json([
            "data" => $this->stocklistadoVenta()
        ],200);
    }

    public function obtenerProducto(Request $request){
        return response()->json([
            'status' => 'success',
            'message' => '',
            "data" =>  $this->verificarProductoId($request->id)
        ],200);
    }

    public function obtenerCategoriaProductos(Request $request){
        return response()->json([
            'status' => 'success',
            'message' => '',
            "data" =>  $this->verificarCategoriaId($request->id)
        ],200);
    }

    //categoria
    public function verificar($nombre)
    {
        return DB::table('tbl_categotia')->where('nombre',$nombre)->get();
    }

    public function verificarCategoriaId($id)
    {
        return DB::table('tbl_productos')->where('categoria', $id)->where('estado', 1)->get();
    }

    public function insertCategoria($nombre)
    {
        $object = [
            "nombre" => $nombre,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s")
        ];
        return DB::table('tbl_categotia')->insertGetId($object);
    }

    public function listadoCategoria()
    {
        return DB::table('tbl_categotia')->get();
    }

    //productos
    public function verificarProducto($nombre)
    {
        return DB::table('tbl_productos')->where('nombre',$nombre)->get();
    }

    public function verificarProductoId($id)
    {
        return DB::table('tbl_productos')->where('id',$id)->get();
    }

    public function insertProducto($arrayProducto)
    {
        return DB::table('tbl_productos')->insertGetId($arrayProducto);
    }

    public function insertVentas($arrayProducto)
    {
        return DB::table('tbl_ventas')->insertGetId($arrayProducto);
    }

    public function listadoProducto(){
        return DB::select('
            SELECT c.nombre as categoria, p.estado, p.created_at, p.updated_at, p.id, p.nombre, p.peso, p.precio, p.referencia, p.stock
            FROM tbl_productos as p
            INNER JOIN tbl_categotia as c
            WHERE p.categoria=c.id and p.estado = "1";'
        );
    }

    public function listadoVentas(){
        return DB::select('
            SELECT c.nombre as categoria, v.estado, v.updated_at, v.created_at, v.id, v.nombre, v.precio, v.stock
            FROM tbl_ventas as v
            INNER JOIN tbl_categotia as c
            WHERE v.categoria=c.id and v.estado = "1";'
        );
    }

    public function stocklistado(){
        return DB::table('tbl_productos')->where('estado','1')->count();
    }

    public function stocklistadoVenta(){
        return DB::table('tbl_ventas')->where('estado','1')->count();
    }

    public function borrar($id){
        return DB::table('tbl_productos')->where('id',$id)->delete();
    }

    public function editar($id,$arrayProducto){
        return DB::table('tbl_productos')->where('id', $id)->update($arrayProducto);
    }

}
