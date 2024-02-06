<template>
    <parent>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <form @submit.prevent="saveProduct()">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="name" placeholder="Enter product name here">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" v-model="form.description" class="form-control" id="description" placeholder="Enter product desc here">
                </div>
                <div class="custom-file"> 
                    <label for="customFile">Product</label>
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose product image</label>
                    <!-- <span class="text-danger" v-if="errors.logo">{{ errors.product }}</span> -->
                </div>
                <div class="form-group">
                    <!-- <label for="dropdown">Brand</label> -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="dropdown">Select brand</label>
                        </div>
                        <!-- <select class="custom-select" id="dropdown" v-model="selectedBrand"> -->
                        <select class="custom-select" id="dropdown" v-model="form.brand_id">
                            <option value="" disabled>Select brand</option>
                            <option v-for="option in dropdownOptions" :key="option.id" :value="option.id">
                                {{ option.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-light">Cancel</button>
            </form>
        </div>
        <!-- /.container-fluid -->
    </parent>
</template>

<script>
import Parent from "../Parent.vue"

export default {
  components: {
    Parent
  },
  data() {
        return {
            dropdownOptions: {},
            form: {
                id : (this.$page.props.product && this.$page.props.product.id) ? this.$page.props.product.id : "", 
                brand_id: null,
                // brand_id: this.$page.props.product ? this.$page.props.product.brand_id : null,
                name : (this.$page.props.product && this.$page.props.product.name) ? this.$page.props.product.name : "", 
                description : (this.$page.props.product && this.$page.props.product.description) ? this.$page.props.product.description : "", 
            },
        }
    },

    methods: {
    saveProduct() {
      this.$inertia.post(route("products.save"), this.form);
    },
  },
    mounted() {
        this.dropdownOptions = this.$page.props.dropdownOptions;
        //if condition
        if (this.$page.props.product) {
        this.form.brand_id = this.$page.props.product.brand_id;
        }
    },
    // mounted(){
    //     this.dropdownOptions = this.$page.props.dropdownOptions
    // },
};
</script>
