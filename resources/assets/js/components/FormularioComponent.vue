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
                                <input type="text" class="form-control" id="titulo" v-model="titulo" required>
                              </div>
                              <div class="form-group required">
                                <label for="reporte">Reporte</label>
                                <textarea class="form-control" rows="5" id="reporte" v-model="reporte" required></textarea>
                              </div>
                              <div class="form-group required">
                                <label for="autor">Autor</label>
                                <input type="text" class="form-control" id="autor" required v-model="autor">
                              </div>
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" v-model="sendNotification" v-on:click="validEmail()"> Recibir notificaciones a mi correo electrónico
                                </label>
                              </div>
                              <div class="form-group required" v-if="sendNotification">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" required v-model="email">
                              </div>
                              <button type="submit" class="btn btn-primary btn-Enviar" v-on:click.prevent="newReporte()">Enviar Reporte</button>
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
            newReporte: function () {
                if (this.titulo != '' && this.reporte != '' && this.autor != '') {
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
                            this.error = false;
                            this.titulo = '';
                            this.reporte = '';
                            this.autor = '';
                            this.email = '';
                        }
                    });
                }else{
                    this.error = true;
                }
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
