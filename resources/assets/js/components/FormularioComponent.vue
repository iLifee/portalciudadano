<template>
    <div class="container">
                <div class="title">
                    <h1 class="pageTitle">Nuevo reporte</h1>
                </div>
                <div class="panel panel-default formulario">
                    <div class="panel-heading">
                        <div class="postText">
                            <div class="alert alert-danger" role="alert" v-if="error">Verifica los campos vacios.</div>
                            <form>
                              <div class="form-group required">
                                <label for="titulo">Título</label>
                                <input class="form-control" id="titulo" v-model="titulo" v-validate="'required'" type="text" name="titulo">
                                <span v-show="errors.has('titulo')" class="help is-danger">{{ errors.first('titulo') }}</span>
                              </div>
                              <div class="form-group required">
                                <label for="reporte">Reporte</label>
                                <textarea class="form-control" rows="10" id="reporte" v-model="reporte" v-validate="'required'" type="text" name="reporte" ></textarea>
                                <span v-show="errors.has('reporte')" class="help is-danger">{{ errors.first('reporte') }}</span>
                              </div>
                              <div class="form-group required">
                                <label for="autor">Autor</label>
                                <input class="form-control" id="autor" v-model="autor" v-validate="'required|alpha_spaces'" type="text" name="autor">
                                <span v-show="errors.has('autor')" class="help is-danger">{{ errors.first('autor') }}</span>
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" v-model="sendNotification" v-on:click="validEmail()"> Recibir notificaciones a mi correo electrónico
                                </label>
                              </div>
                              <div class="form-group required" v-if="sendNotification">
                                <label for="email">Correo electrónico</label>
                                <input class="form-control" id="email" v-model="email" v-validate="'required|email'" type="text" name="email">
                                <span v-show="errors.has('email')">{{ errors.first('email') }}</span>
                              </div>
                              <button type="button" class="btn btn-primary btn-Enviar" v-on:click.prevent="validateForm()">Enviar Reporte</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            validEmail: function(){
                if (this.sendNotification) {
                    this.email = '';
                }
            },
            validateForm: function(){
                this.$validator.validateAll().then((result) => {
                if (result) {
                    swal.showLoading();
                    let urlStore = 'Reporte';
                    axios.post(urlStore, {
                        titulo: this.titulo,
                        contenido: this.reporte,
                        autor: this.autor,
                        autor_correo_electronico: this.email   
                    }).then(response => {
                        console.log(response);
                        if (response.data.success) {
                            swal.hideLoading();
                            toastr.success('Reporte guardado.');
                            // this.error = false;
                            this.titulo = '';
                            this.reporte = '';
                            this.autor = '';
                            this.email = '';
                        }
                    });
                  return;
                }
                toastr.warning('Verifica los campos que son obligatorios. ');
              });
            },
        },
        data: function () {
          return {
            titulo: '',
            reporte: '',
            autor: '',
            sendNotification: false,
            email: '',
            error: false,
          }
        },
    }
</script>
