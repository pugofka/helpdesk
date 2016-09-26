<template>
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">Example Componentfdfdf</h4>
            <p class="card-text">I'm an example component!
                {{ message }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>


</template>

<script>
    export default {
        data () { /* ES2015 эквивалент для: `data: function () {` */
            return {
                message: 'Hello Hsd!'
            };
        }
    }
</script>
