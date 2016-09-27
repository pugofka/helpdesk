<div class="popup-form new-client">
    <header>
        <p class="pull-left">New Client</p>
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
            <input v-model="client.name" placeholder="Client Name" type="text" class="form-control first">
            <input v-model="client.email" placeholder="Email" type="text" class="form-control">
            <input v-model="client.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
            <input v-model="client.phone_number" placeholder="Contact Number" type="text"class="form-control">
        </form>
    </section>
    <footer>
        <a v-on:click="create(client,true)" class="btn btn-primary pull-right">Save</a>
        <div class="clearfix"></div>
    </footer>
</div>