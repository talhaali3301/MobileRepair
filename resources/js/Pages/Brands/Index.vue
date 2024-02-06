<template>
  <parent>
    <div class="container-fluid">
      <h1 class="mb-4">Brand List</h1>
      <!-- Display success message if it exists -->
      <div v-if="successMessage" class="alert alert-success" role="alert">
        {{ successMessage }}
      </div>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col">Created Date</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(brand, index) in brands" :key="brand.id">
              <th scope="row">{{ index + 1 }}</th>
              <td>{{ brand.name }}</td>
              <td>{{ brand.description }}</td>
              <td>{{ brand.status }}</td>
              <td>{{ brand.created_date }}</td>
              <td>
                <Link :href="route('brands.edit', brand.id)">
                  <button class="btn btn-sm btn-info">Edit</button>
                </Link>
                <Link :href="route('brands.delete', brand.id)">
                  <button class="btn btn-sm btn-danger">Delete</button>
                </Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </parent>
</template>

<script>
import Parent from "../Parent.vue";

export default {

  components: {
    Parent,
  },
  props: {
    brands: {
      type: Array,
      required: true,
    },
  },
  data() {
    return {
      successMessage: "Brand saved successfully",
    };
  },
  created() {
    this.successMessage = this.$props.successMessage || "";
  },
  methods: {
    editBrand(id) {
      console.log(`Edit brand with ID ${id}`);
    },
    deleteBrand(id) {
      console.log(`Delete brand with ID ${id}`);
    },
  },
};
</script>
