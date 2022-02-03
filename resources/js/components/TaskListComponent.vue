<template>
    <div>
        <b>{{task.title}}</b> <br>
        <span style="font-size:11px; color:grey;">{{task.description}}</span>
        <a href="#!" class="secondary-content" @click="deleteTask()">
            <i class="material-icons">delete</i>
        </a>
    </div>
</template>

<script>
export default {
    props: ['task'],
    methods: {
        deleteTask (){
            
            axios.delete('api/tasks/' + this.task.id)
            .then( response => {
                this.$emit('taskchanged');
            })
            .catch( error => {
                console.log(error);
            })
        }
    },
}
</script>