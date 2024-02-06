<template>
    
    <parent>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <form @submit.prevent="saveBrand()">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="name" aria-describedby="" placeholder="Enter brand name here">
                    <span class="text-danger" v-if="errors.name">{{ errors.name }}</span>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" v-model="form.description" class="form-control" id="description" aria-describedby="" placeholder="Enter brand desc here">
                    <span class="text-danger" v-if="errors.description">{{ errors.description }}</span>
                </div>

                <div class="custom-file"> 
                    <label for="customFile">Logo</label>
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose logo</label>
                    <span class="text-danger" v-if="errors.logo">{{ errors.logo }}</span>
                 </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-light">Cancel</button>
                <!-- <button type="reset" class="btn btn-light" @click="cancel">Cancel</button> -->

            </form>

        </div>
        <!-- /.container-fluid -->
    </parent>
</template>

<script>
import Parent from "../Parent.vue"


export default {
  
  props: ["errors"],

  components: {
    Parent,
  },
  data() {
    return {

      form: {
        id : (this.$page.props.brand && this.$page.props.brand.id) ? this.$page.props.brand.id : "", 
        name : (this.$page.props.brand && this.$page.props.brand.name) ? this.$page.props.brand.name : "", 
        description : (this.$page.props.brand && this.$page.props.brand.description) ? this.$page.props.brand.description : "", 
      },
    };
  },
  methods: {
    saveBrand() {
      this.$inertia.post(route("brands.save"), this.form);
    },
    cancel() {
      // cancel function
    },
  },
};
</script>