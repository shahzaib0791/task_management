<template>
    <div class="task-container">
        <div class="heading">
            <h2 id="title">Task Management</h2>
            
        </div>
        <div class="row">
            <div class="col s8">
                <task-listing-component 
                :tasks="tasks"
                v-on:reloadlist="getList()"
                />
            </div>
            <div class="col s4">
                <add-task-component :status_list="status_list"  :tasks="tasks" v-on:reloadlist="getList()"/>
            </div>
        </div> 
    </div>
</template>

<script>

import AddTaskComponent from './AddTaskComponent';
import TaskListingComponent from './TasksComponent';

export default {
    components:{
        AddTaskComponent,
        TaskListingComponent
    },

    data: function(){
        return  {
            tasks:[],
            status_list:[]
        }
    },

    methods: {
        getList (){
            axios.get('api/tasks')
            .then( response => {
                this.tasks = response.data
            })
            .catch( error => {
                console.log(error);
            })
        },

        getStatusList (){
            axios.get('api/get-status')
            .then( response => {
                this.status_list = response.data
            })
            .catch( error => {
                console.log(error);
            })
        }
    },
    created(){
        this.getList();
        this.getStatusList();
    }
}
</script>


<style scoped>

</style>