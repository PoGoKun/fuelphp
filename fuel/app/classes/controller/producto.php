<?php

class Controller_Producto extends Controller_Template
{
    public function action_index()
    {
        $data['productos'] = Model_Producto::find('all');
        $data['subnav'] = array('index' => 'active', 'create' => '');

        $this->template->title = "Productos";
        $this->template->content = View::forge('producto/index', $data);
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('producto');

        if ( ! $data['producto'] = Model_Producto::find($id))
        {
            Session::set_flash('error', 'No se ha podido encontrar el producto #'.$id);
            Response::redirect('producto');
        }

        $this->template->title = "Producto";
        $this->template->content = View::forge('producto/view', $data);
    }

    public function action_create()
    {
        $data['subnav'] = array('index' => '', 'create' => 'active');

        if (Input::method() == 'POST')
        {
            $val = Model_Producto::validate('create');

            if ($val->run())
            {
                $producto = Model_Producto::forge(array(
                    'nombre' => Input::post('nombre'),
                    'descripcion' => Input::post('descripcion'),
                    'precio' => Input::post('precio'),
                ));

                if ($producto and $producto->save())
                {
                    Session::set_flash('success', 'Añadido producto #'.$producto->id.'.');

                    Response::redirect('producto');
                }
                else
                {
                    Session::set_flash('error', 'No se ha podido guardar el producto.');
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Productos";
        $this->template->content = View::forge('producto/create', $data);
    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('producto');

        if ( ! $producto = Model_Producto::find($id))
        {
            Session::set_flash('error', 'No se ha podido encontrar el producto #'.$id);
            Response::redirect('producto');
        }

        $val = Model_Producto::validate('edit');

        if ($val->run())
        {
            $producto->nombre = Input::post('nombre');
            $producto->descripcion = Input::post('descripcion');
            $producto->precio = Input::post('precio');

            if ($producto->save())
            {
                Session::set_flash('success', 'Actualizado producto #' . $id);

                Response::redirect('producto');
            }
            else
            {
                Session::set_flash('error', 'No se ha podido actualizar el producto #' . $id);
            }
        }
        else
        {
            if (Input::method() == 'POST')
            {
                $producto->nombre = $val->validated('nombre');
                $producto->descripcion = $val->validated('descripcion');
                $producto->precio = $val->validated('precio');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('producto', $producto, false);
        }

        $this->template->title = "Productos";
        $this->template->content = View::forge('producto/edit');
    }

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('producto');

        if ($producto = Model_Producto::find($id))
        {
            $producto->delete();

            Session::set_flash('success', 'Eliminado producto #'.$id);
        }
        else
        {
            Session::set_flash('error', 'No se ha podido eliminar el producto #'.$id);
        }

        Response::redirect('producto');
    }
}
