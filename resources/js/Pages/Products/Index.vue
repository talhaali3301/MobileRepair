<template>
    <parent>
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Brand</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products" :key="product.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ product.brand.name }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>
                        <Link :href="route('products.edit', product.id)">
                        <button class="btn btn-sm btn-info">Edit</button>
                        </Link>
                        <Link :href="route('products.delete', product.id)">
                        <button class="btn btn-sm btn-danger">Delete</button>
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </parent>
</template>

<script>
import Parent from "../Parent.vue";

export default {
    components: {
        Parent
    },
    props: {
        products: {
        type: Array,
        required: true,
        },
    },
}
</script>
