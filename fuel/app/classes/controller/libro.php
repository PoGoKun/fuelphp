<?php
class Controller_Libro extends Controller_Template
{
    public function action_index()
    {
        $data['libros'] = Model_Libro::find('all');
        $this->template->title = "Libros";
        $this->template->content = View::forge('libro/index', $data); 
    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('libro');

        if ( ! $data['libro'] = Model_Libro::find($id))
        {
            Session::set_flash('error', 'Could not find libro #'.$id);
            Response::redirect('libro');
        }

        $this->template->title = "Libro";
        $this->template->content = View::forge('libro/view', $data);
    }

    public function action_create()
    {
        if (Input::method() == 'POST')
        {
            $val = Model_Libro::validate('create');

            if ($val->run())
            {
                $libro = Model_Libro::forge(array(
                    'titulo' => Input::post('titulo'),
                    'resumen' => Input::post('resumen'),
                    'creador' => Input::post('creador'),
                ));

                if ($libro and $libro->save())
                {
                    Session::set_flash('success', 'Added libro #'.$libro->id.'.');
                    Response::redirect('libro');
                }
                else
                {
                    Session::set_flash('error', 'Could not save libro.');
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Libros";
        $this->template->content = View::forge('libro/create');
    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('libro');

        if ( ! $libro = Model_Libro::find($id))
        {
            Session::set_flash('error', 'Could not find libro #'.$id);
            Response::redirect('libro');
        }

        $val = Model_Libro::validate('edit');

        if ($val->run())
        {
            $libro->titulo = Input::post('titulo');
            $libro->resumen = Input::post('resumen');
            $libro->creador = Input::post('creador');

            if ($libro->save())
            {
                Session::set_flash('success', 'Updated libro #' . $id);
                Response::redirect('libro');
            }
            else
            {
                Session::set_flash('error', 'Could not update libro #' . $id);
            }
        }
        else
        {
            if (Input::method() == 'POST')
            {
                $libro->titulo = Input::post('titulo');
                $libro->resumen = Input::post('resumen');
                $libro->creador = Input::post('creador');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('libro', $libro, false);
        }

        $this->template->title = "Libros";
        $this->template->content = View::forge('libro/edit');
    }

    public function action_delete($id = null)
    {
        is_null($id) and Response::redirect('libro');

        if ($libro = Model_Libro::find($id))
        {
            $libro->delete();

            Session::set_flash('success', 'Deleted libro #'.$id);
        }
        else
        {
            Session::set_flash('error', 'Could not delete libro #'.$id);
        }

        Response::redirect('libro');
    }
}
