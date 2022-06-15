
// @ is an alias to /src
import {apiFetch} from "../functions/fetch.js";
import usuarios from "../functions/usuarios.js";

export default {
	name: 'crearUsuario',
	data(){
        return {
            usuario:{
                email_usuario: null,
                password_usuario: null,
                password2_usuario: null
            },

            errors: [], /*{
                email_usuario: null,
                password_usuario: null,
                password2_usuario: null
            },*/

            loading: false,
            notification: {text:null,type:'success'}, 
            showError: false

        }
	}, 
	
	methods: {
      crearUsuario(){
          //if(this.loading) return;      
          //if(!this.validates()) return;

          /*this.loading = true;*/
          this.loading = true;

          if(!this.validates()){
              usuarios.crearUsuario(this.usuario.email_usuario, this.usuario.password_usuario)
              .then(data => {
                this.loading = false;
                this.perfil = data.data;
                this.$router.push('/login');
              });
          }else{
             console.log(this.errors);
          }

          
      },
        validates(){            
          /*Seteamos las variables como nulas para borrar valores de validaciones anteriores*/
            /*this.errors.email_usuario=null;
            this.errors.password_usuario=null;
            this.errors.password2_usuario=null;*/
            this.errors=[];            
            this.showError= false; 
            
            if(this.usuario.email_usuario == null || this.usuario.email_usuario === '' ){
                this.errors.push ('No se encontro ningun email');
                this.showError= true;
                //return true;            
            }

            if(this.usuario.password_usuario == null || this.usuario.password_usuario === '' ){
                this.errors.push ('No escribio ninguna contraseña');
                this.showError= true;
                //return true;            
            }       

            if(this.usuario.password2_usuario == null || this.usuario.password2_usuario === '' ){
                this.errors.push ('No escribio de nuevo la contraseña');
                this.showError= true;
                //return true;            
            }   
            if(this.usuario.password2_usuario !=  this.usuario.password_usuario){
                this.errors.push ('Contraseñas distintas');
                this.showError= true;
               //return true;            
            }      
             return this.showError
        }
	}
	
}
