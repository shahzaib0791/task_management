<template>
  <div class="">
    <h4>Add Task form</h4>
    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s12">
            <input
              placeholder="Title"
              type="text"
              class="validate"
              v-model="task.title"
            />
            <label for="first_name">Task Title*</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <textarea
              id="textarea1"
              class="materialize-textarea"
              v-model="task.description"
            ></textarea>
            <label for="textarea1">Description*</label>
          </div>
        </div>
        <div class="row">
            <div class="input-field col s12" >
                <select @change="handleChange">
                    <option selected disabled></option>
                    <option value="1">todo</option>
                    <option value="2">In-Progress</option>
                    <option value="3">Completed</option>
                </select>
                <label>Select*</label>
            </div>
        </div>
      </form>
    </div>

    <a class="waves-effect waves-light btn" @click="addTask()">Add Task</a>
  </div>
</template>

<script>

export default {
    
    props: ['status_list'],

  data: function () {
    return {
      task: {
        title: "",
        description:"",
        status_id:""
      },
    };
  },
  methods: {

    handleChange(e) {
        if(e.target.options.selectedIndex > -1) {
            this.task.status_id = e.target.options[e.target.options.selectedIndex].value;
        }
    },

    addTask() {
      if (this.task.title == "") {
        return;
      }

      if (this.task.description == "") {
        return;
      }

       if (this.task.status_id == "") {
        return;
      }

      var formData = new FormData();
      formData.append("title", this.task.title);
      formData.append("description", this.task.description);
      formData.append("status_id", this.task.status_id);

      axios.post("api/tasks", formData)
        .then((response) => {
          if (response.status == 201) {
            this.task.name == "";
            this.$emit("taskchanged");
            this.$forceUpdate();
            location.reload();
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>