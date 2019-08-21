<?php

namespace App\Policies;

use App\Usuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the usuario.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function view(Usuario $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can create usuarios.
     *
     * @param  \App\Usuario  $user
     * @return mixed
     */
    public function isAdmin(Usuario $user)
    {
        return $user->rol === 'administrador';
    }
    public function isCliente(Usuario $user)
    {
        return $user->rol === 'cliente';
    }

    /**
     * Determine whether the user can update the usuario.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function update(Usuario $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can delete the usuario.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function delete(Usuario $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can restore the usuario.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function restore(Usuario $user, Usuario $usuario)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the usuario.
     *
     * @param  \App\Usuario  $user
     * @param  \App\Usuario  $usuario
     * @return mixed
     */
    public function forceDelete(Usuario $user, Usuario $usuario)
    {
        //
    }
}
