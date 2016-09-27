<div class="popup-form new-project">
    <header>
        <p class="pull-left">New Project</p>
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
            <input v-model="newProject.name" placeholder="Name" type="text" class="form-control first">
        </form>
    </section>
    <footer>
        <a v-on:click="createProject(true)" class="btn btn-primary pull-right">Save</a>
        <div class="clearfix"></div>
    </footer>
</div>