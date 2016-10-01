<template>

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
            <span v-if="msg.success != null" class="status-msg success-msg">@{{ msg.success }}</span>
            <span v-if="msg.error != null" class="status-msg error-msg">@{{ msg.error }}</span>
            <input v-model="name" placeholder="Client Name" type="text" class="form-control first">
            <input v-model="email" placeholder="Email" type="text" class="form-control">
            <input v-model="full_name" placeholder="Full name" type="text" class="form-control">
            <input v-model="phone" placeholder="Contact Number" type="text"class="form-control">
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
                name: null,
                email: null,
                full_name: null,
                phone: null,
//                currentClient: null,
                msg: {success: null, error: null}
            };
        },

        methods: {
            showClientCreateForm: function(){
                this.msg.success = null;
                this.msg.error = null;
                $(".new-client").show();
                $(".new-client .first").focus();
            },

            create: function(new_client, update){

                update = update || false;

                $.ajax({
                    type: 'POST',
                    url: window.baseurl + "/api/clients",
                    data: {
                        "name": name,
                        "fullname": full_name,
                        "email": email,
                        "phone": phone
                    },
                    error: function(e) {
                        var response = jQuery.parseJSON(e.responseText);
                        $('.new-client .status-msg').text("")
                                .removeClass('success-msg')
                                .addClass("error-msg")
                                .text(response.message);
                        return false;
                    },

                    success: function(result){
                        $('.new-client .status-msg').text("")
                                .removeClass('remove-msg')
                                .addClass("success-msg")
                                .text(result.message);

                        if (update == true){
                            result.data.projects = [];
                            client.clients.push(result.data);
                            Vue.nextTick(function () {
                                megaMenuInit();
                            })
                        }

                        new_client.name = null;
                        new_client.phone_number = null;
                        new_client.point_of_contact = null;
                        new_client.email = null;
                        $('.popup-form.new-client').find('input[type=text],textarea,select').filter(':visible:first').focus();
                    }
                });
            }
        }
    }


</script>
