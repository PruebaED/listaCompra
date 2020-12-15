<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    
	/* public function getIndex() {

		return view('productos.index');

	} */

	/* public function getIndex() {

		return view('productos.index', array('arrayProductos' => $this->arrayProductos));

	} */

	public function getIndex() {

		return view('productos.index', array('arrayProductos' => Producto::all()));

	} 

	/* public function getShow($id) {

		return view('productos.show', array('id' => $id));

	} */

	/* public function getShow($id) {

		return view('productos.show', 
			array(
				'producto' => $this->arrayProductos[$id-1],
				'id' => $id - 1
			)
		);

	} */

	public function getShow($id) {

		return view('productos.show', 
			array(
				'producto' => Producto::findOrFail($id)
			)
		);

	}

	public function getCreate() {

		return view('productos.create');

	}

	public function postCreate(Request $request) {

		$producto = new Producto();
		$producto->nombre = $request->input('nombre');
		$producto->precio = $request->input('input');
		$producto->categoria = $request->input('categoria');
		$producto->imagen = $request->input('imagen');
		$producto->descripcion = $request->input('descripcion');
		$producto->save();
		return redirect('/productos');

	}

	/* public function getEdit($id) {

		return view('productos.edit', array('id' => $id));

	} */

	public function getEdit($id) {

		return view('productos.edit', array('producto' => Producto::findOrFail($id)));

	}

	public function putEdit(Request $request) {

		$id = $request->input('id');
		$producto = Producto::findOrFail($id);
		$producto->nombre = $request->input('nombre');
		$producto->precio = $request->input('precio');
		$producto->categoria = $request->input('categoria');
		$producto->imagen = $request->input('imagen');
		$producto->descripcion = $request->input('descripcion');
		$producto->save();
		return redirect('/productos/show/' . $id);

	}

}
