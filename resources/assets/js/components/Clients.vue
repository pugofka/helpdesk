<template>

<div class="row">
    <div class="col-xs-12 page-title-section">
        <h1 class="pull-left">Клиенты</h1>
        <a class="btn btn-primary pull-right" title="Create new client" @click="showClientCreateForm()">+ Добавить клиента</a>
        <div class="clearfix"></div>
    </div>
</div>

<div v-if="clients.length != 0">
    <div class="row" >
        <div class="col-xs-12">
            <div class="content-menu">
                <div class="links">
                    <a v-for="client in clients" data-id="client_{{client.id}}" href="">
                        {{client.name}}
                    </a>
                </div>

                <div class="content">
                    <div v-for="client in clients" class="item" id="client_{{client.id}}" title="Edit client">
                        <header>
                            <div class="client client-info-{{$index}} page-title-section">
                                <h2 class="pull-left">{{client.name}} <a @click="startClientEditMode($index)" class="show-on-hover btn btn-default" title="Edit Client"><i class="ion-edit"></i></a></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div>
                                <p><label>Полное название компании: </label> {{client.full_name}}</p>
                                <p><label>Телефон: </label> {{client.phone}}</p>
                                <p><label>Email: </label> <a href="mailto:{{client.email}}">{{client.email}}</a></p>
                            </div>
                        </header>
                        <hr>
                        <span @click="showNewProjectForm(client.id, $index)" title="Create new project" class="btn btn-default pull-right">Новый договор</span>

                            <h4>Договоры</h4>
                            <table class="table">
                                <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Номер договора</td>
                                    <td>Дата договора</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="contract in client.contracts">
                                    <td>{{ $index + 1}} </td>
                                    <td><a href="">{{ contract.name}}</a></td>
                                    <td>{{ contract.date}}</td>
                                </tr>
                                </tbody>
                            </table>


                        <br>
                        <div class="clearfix"></div>
                        <hr><br><br>
                        <span @click="deleteClient(client, $index)" class="btn btn-danger pull-right">Delete {{ client.name }}</span>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div v-if="clients.length == 0">
    <div class="clearfix"></div>
    <p class="alert alert-warning">
        Your clients will be listed here once you create some.
        Create a new client <a @click="showClientCreateForm()">now</a>.
    </p>
</div>


    <div class="popup-form new-client">
        <header>
            <p class="pull-left">Новый клиент</p>
            <div class="actions pull-right">
                <i title="Minimze "class="ion-minus-round"></i>
                <i title="Close" class="ion-close-round"></i>
            </div>
            <div class="clearfix"></div>
        </header>
        <section>
            <form>
                <span v-if="msg.success != null" class="status-msg success-msg">{{ msg.success }}</span>
                <span v-if="msg.error != null" class="status-msg error-msg">{{ msg.error }}</span>
                <input v-model="client.name" placeholder="Client Name" type="text" class="form-control first">
                <input v-model="client.email" placeholder="Email" type="text" class="form-control">
                <input v-model="client.full_name" placeholder="Full name" type="text" class="form-control">
                <input v-model="client.phone" placeholder="Contact Number" type="text"class="form-control">
            </form>
        </section>
        <footer>
            <a @click="create(client,true)" class="btn btn-primary pull-right">Save</a>
            <div class="clearfix"></div>
        </footer>
    </div>

</template>

<script>
    export default {

        data () {
            return {
                clients: [],
                client: {
                    name:null,
                    full_name:null,
                    phone:null,
                    email:null
                },
                currentClient: null,
                newProjectClientId: {name: null, project_id: null},
                newProject: {name: null, project_id: null},
                tempClientIndex: null,
                lastRequest: false,
                msg: {success: null, error: null}
            };
        },

        ready (){
            this.getClients();
        },

        methods: {
            getClients: function () {
                $.get("/api/clients", function (result) {
                    this.clients = result.data;

                    Vue.nextTick(function () {
                        contentMenuInit();
                    })
                }.bind(this)).fail(function (e) {
                    console.log(e);
                });
            },

            deleteClient(client) {
                this.$http.delete('clients/'+client.id).then((response) => {

                    // get status
                   if (response.status == 200) {
                       this.clients.$remove(client);
                       $(".content-menu .links a").removeClass("active").addClass("inactive");
                       $(".content-menu .links a:first-child").removeClass("inactive").addClass("active");
                       $(".content-menu .content .item").hide();

                       $(".content-menu .content div:first-child").show()
                   }
                }, (response) => {
                    // error callback
                    console.log('error delete client' + client);
                });
            },

            showClientCreateForm: function(){
                this.msg.success = null;
                this.msg.error = null;
                $(".new-client").show();
                $(".new-client .first").focus();
            },

            create: function(new_client, update){

                this.$http.post('/clients', {new_client}).then((response) => {

                    // get status
                    if (response.status == 200) {
                        this.msg.success = response.body.message;
                        this.clients.$remove(client);
                        new_client.name = null;
                        new_client.full_name = null;
                        new_client.phone= null;
                        new_client.email = null;
                        $('.popup-form.new-client').find('input[type=text],textarea,select').filter(':visible:first').focus();
                    }

                }, (response) => {
                    // error callback
                    this.msg.error = response.body.message;
                });
            },
        }
    }





//            showCreateForm: function(){
//                this.msg.success = null;
//                this.msg.error = null;
//                $(".new-client").show();
//                $(".new-client .first").focus();
//            },
//            create: function(new_client, update){
//
//                update = update || false;
//
//                $.ajax({
//                    type: 'POST',
//                    url: window.baseurl + "/api/clients",
//                    data: new_client,
//                    error: function(e) {
//                        var response = jQuery.parseJSON(e.responseText);
//                        $('.new-client .status-msg').text("")
//                                .removeClass('success-msg')
//                                .addClass("error-msg")
//                                .text(response.message);
//                        return false;
//                    },
//
//                    success: function(result){
//                        $('.new-client .status-msg').text("")
//                                .removeClass('remove-msg')
//                                .addClass("success-msg")
//                                .text(result.message);
//
//                        if (update == true){
//                            result.data.projects = [];
//                            client.clients.push(result.data);
//                            Vue.nextTick(function () {
//                                megaMenuInit();
//                            })
//                        }
//
//                        new_client.name = null;
//                        new_client.phone_number = null;
//                        new_client.point_of_contact = null;
//                        new_client.email = null;
//                        $('.popup-form.new-client').find('input[type=text],textarea,select').filter(':visible:first').focus();
//                    }
//                });
//            },
//            startClientEditMode: function(clientIndex){
//                this.msg.success = null;
//                this.msg.error = null;
//                this.currentClient = this.clients[clientIndex];
//                this.currentClient.position = clientIndex;
//
//                $(".popup-form.update-client").show();
//                $(".popup-form.update-client").find('input[type=text],textarea,select').filter(':visible:first').focus();
//            },
//            updateClient: function(){
//
//                var data = this.currentClient;
//                var id = data.id;
//                data._method = "put";
//
//                $.ajax({
//                    type: "POST",
//                    url: window.baseurl + "/api/clients/"+id,
//                    data: data,
//                    success: function(e){
//                        console.log(e);
//                        client.msg.success = e.message;
//                        client.msg.error = null;
//                    },
//                    error: function(e){
//                        var response = jQuery.parseJSON(e.responseText);
//                        client.msg.success = null;
//                        client.msg.error = response.message;
//                    }
//                });
//            },
//            deleteClient: function(currentClient, clientIndex){
//                this.currentClient = currentClient;
//
//                showSheet();
//                makePrompt(
//                        "Are you sure you want to delete the client: "+currentClient.name+"?",
//                        "By deleting this client you will loose all data associated with any project under this client",
//                        "Not now", "Yes");
//
//                $("#cancel-btn").click(function(){
//                    closePrompt();
//                });
//
//                $("#confirm-btn").click(function(){
//                    $.ajax({
//                        type: "POST",
//                        url: window.baseurl + "/api/clients/"+currentClient.id,
//                        data: {_method: "delete"},
//                        success: function(){
//                            client.clients.splice(clientIndex);
//                            client.currentClient = null;
//
//                            $(".mega-menu .links a").removeClass("active").addClass("inactive");
//                            $(".mega-menu .links a:first-child").removeClass("inactive").addClass("active");
//                            $(".mega-menu .content .item").hide();
//                            var id = "#" + $(".mega-menu .content div:first-child").show();
//
//                            closePrompt();
//                        },
//                        error: function(){
//                            client.currentClient = null;
//                            closePrompt();
//                        }
//                    });
//                });
//            },
//            showNewProjectForm: function(clientId, clientIndex){
//
//                this.msg.success = null;
//                this.msg.error = null;
//                this.newProject.client_id = clientId;
//                this.tempClientIndex = clientIndex;
//
//                $(".popup-form.new-project").show();
//                $(".popup-form.new-project .first").focus();
//            },
//            createProject: function(){
//
//                $.ajax({
//                    type: 'POST',
//                    url: window.baseurl + "/api/projects",
//                    data: client.newProject,
//                    error: function(e) {
//                        var response = jQuery.parseJSON(e.responseText);
//                        client.msg.success = null;
//                        client.msg.error = response.message;
//                    },
//                    success: function(result){
//                        console.log(client.clients);
//                        console.log(result);
//                        client.clients[client.tempClientIndex].projects.push(result.data);
//                        client.msg.success = result.message;
//                        client.msg.error = null;
//
//                        client.newProject.name = null;
//                        client.newProject.project_id = null;
//                        $('.popup-form.new-project').find('input[type=text],textarea,select').filter(':visible:first').focus();
//                    }
//                });
//            }

</script>
