<div style="z-index: 20" class="popup-form update-client">
    <header>
        <p class="pull-left">Update Client</p>
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
            <span class="status-msg"></span>
            <input v-model="currentClient.name" placeholder="Client Name" type="text" class="form-control first">
            <input v-model="currentClient.email" placeholder="Email" type="text" class="form-control">
            <input v-model="currentClient.point_of_contact" placeholder="Point Of Contact" type="text" class="form-control">
            <input v-model="currentClient.phone_number" placeholder="Contact Number" type="text"class="form-control">
        </form>
    </section>
    <footer>
        <a v-on:click="updateClient()" class="btn btn-primary pull-right">Update</a>
        <div class="clearfix"></div>
    </footer>
</div>