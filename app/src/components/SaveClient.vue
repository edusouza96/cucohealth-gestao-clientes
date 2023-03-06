<template>
    <div class="add-client-modal">
        <div class="modal fade" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" id="add_client_modal" >
            <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header text-white bg-dark bg-gradient">
                        <h5 class="modal-title">Salvar Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <Message :message="message" :typeMessage="typeMessage" :loading="false"/>

                        <form v-if="!loading" class="px-5 pt-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" name="name" v-model="name" id="name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="cpf">CPF</label>
                                        <input type="text" name="cpf" v-model="cpf" id="cpf" class="form-control" v-mask="'###.###.###-##'">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="birth_date">Data de Nascimento</label>
                                        <input type="date" name="birth_date" v-model="birthDate" id="birth_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="phone">Telefone <small class="muted">(opcional)</small></label>
                                        <input type="text" name="phone" v-model="phone" id="phone" class="form-control" v-mask="['(##)#####-####', '(##)####-####']">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div v-if="loading" class="text-center">
                            <i class="fas fa-spinner fa-spin fa-5x"></i>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                           <i class="fas fa-undo"></i>  Voltar
                        </button>
                        <button type="button" class="btn btn-success" @click="submit">
                            <i class="fas fa-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mask} from 'vue-the-mask';
import Message from './Message.vue';
export default {
    directives: {mask},
    components: {Message},
    data() {
        return {
            name: '',
            cpf: '',
            birthDate: '',
            phone: '',
            message: '',
            typeMessage: null,
            loading: false,
        }
    },
    methods: {
        reset(){
            this.name = '';
            this.cpf = '';
            this.birthDate = '';
            this.phone = '';
        },
        submit(){
            this.loading = true;
            this.typeMessage = null;
            this.message = null;

            let data = {
                name: this.name, 
                cpf: this.cpf, 
                birth_date: this.birthDate, 
            };

            if(this.phone){
                data.phone = this.phone;
            }
            
            this.axios({
                method: 'POST',
                url: "http://localhost:8000/api/clientes",
                data: data,
            })
            .then((response) => {
                if (response.data.success) {
                    let message = response.data.message;
                    this.loading = false;
                    this.$emit('stored', message);
                    this.reset();
                }else{
                    this.message = 'Ocorreu um erro, tente novamente.';
                    this.loading = false;
                    this.typeMessage = 'danger';
                }
            }).catch((error) => {
                this.message = error.response.data.message;
                this.loading = false;
                this.typeMessage = 'danger';
            });
        }   
    },
}
</script>