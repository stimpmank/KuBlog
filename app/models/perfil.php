<?php
/**
 * KBlog - KumbiaPHP Blog
 * PHP version 5
 * LICENSE
 *
 * This source file is subject to the GNU/GPL that is bundled
 * with this package in the file docs/LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to deivinsontejeda@gmail.com so we can send you a copy immediately.
 *
 * @author Deivinson Tejeda <deivinsontejeda@gmail.com>
 */
class Perfil extends ActiveRecord {
    const COLABORADOR = 'colaborador';
    const AUTOR = 'autor';
    const EDITOR= 'editor';
    const ADMINISTRADOR = 'administrador';

    public function initialize () {
        $this->has_many('controlador');
    }
    /**
     * Se verifica mediante un callback de ActiveRecord
     * que el perfil a eliminar no se encuentre asociado
     * algún controller
     */
    public function before_delete () {
        $controller = new Controllers();
        if ($controller->count("perfil_id=$this->id")) {
            Flash::error('El perfil no se puede eliminar porque esta asociado');
            return 'cancel';
        }
    }
}
