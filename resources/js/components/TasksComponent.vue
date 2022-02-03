<template>
    <div>
        <div class="row">
            <div class="col s12 m4" ondrop="drop(event)" ondragover="allowDrop(event)" >
                <ul class="collection with-header"  style="min-height:1000px; max-height:1500px" data-list-id="1">
                    <li class="collection-header"><h4>Todo List</h4></li>
                    <div v-if="tasks.todo">
                        <li class="collection-item" v-for="(task, index) in tasks.todo[0].tasks" :key="index" draggable="true" ondragstart="drag(event)" :data-status-id="tasks.todo[0].id" :data-task-id="task.id" :id="task.id + '_l1'">
                            <list-item 
                                :task="task"
                                v-on:taskchanged="$emit('reloadlist')"
                            />
                        </li>
                    </div>
                    
                </ul>
            </div>


            <div class="col s12 m4"  ondrop="drop(event)" ondragover="allowDrop(event)"  >
    
                <ul class="collection with-header"  style="min-height:1000px; max-height:1500px" data-list-id="3">
                    <li class="collection-header"><h4>Completed List</h4></li>
                    <div v-if="tasks.completed">
                        <li class="collection-item" v-for="(task, index) in tasks.completed[0].tasks" :key="index" draggable="true" ondragstart="drag(event)" :data-status-id="tasks.completed[0].id" :data-task-id="task.id" :id="task.id + '_l2'">
                            <list-item 
                                :task="task"
                                class="task"
                                v-on:taskchanged="$emit('reloadlist')"
                            />
                        </li>
                    </div>
                  
                </ul>
            </div>


            <div class="col s12 m4" ondrop="drop(event)" ondragover="allowDrop(event)" >
                <ul class="collection with-header" style="min-height:1000px; max-height:1500px" data-list-id="2">
                    <li class="collection-header"><h4>InProgress List</h4></li>
                    <div v-if="tasks.inprogress">
                        <li class="collection-item" v-for="(task, index) in tasks.inprogress[0].tasks" :key="index" draggable="true" ondragstart="drag(event)" :data-status-id="tasks.inprogress[0].id" :data-task-id="task.id" :id="task.id + '_l3'">
                            <list-item 
                                :task="task"
                                class="task"
                                v-on:taskchanged="$emit('reloadlist')"
                            />
                        </li>
                    </div>
                </ul>
            </div>
        </div>

    </div>

</template>

<script>

import ListItem from "./TaskListComponent";

export default {
    props: ['tasks'],
    components: {
        ListItem
    }
}

</script>