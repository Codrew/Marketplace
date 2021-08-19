<template>
    <div>
        <div class="form-group">
            <select
                class="form-control"
                name="category_id"
                v-model="category"
                @change="getSubcategories()"
            >
                <option value="" selected>Choose Category</option>
                <option
                    v-for="category in categories"
                    :value="category.id"
                    :key="category.id"
                >
                    {{ category.name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <select
                class="form-control"
                name="subcategory_id"
                v-model="subcategory"
                @change="getChildcategories()"
            >
            >
                <option value="" selected>Choose subcategory</option>
                <option
                    v-for="subcategory in subcategories"
                    :value="subcategory.id"
                    :key="subcategory.id"
                >
                    {{ subcategory.name }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <select
                class="form-control"
                name="childcategory_id"
                v-model="childcategory"
            >
                <option value="" selected>Choose subcategory</option>
                <option
                    v-for="childcategory in childcategories"
                    :value="childcategory.id"
                    :key="childcategory.id"
                >
                    {{ childcategory.name }}
                </option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category: "",
            categories: [],
            subcategory: "",
            subcategories: [],
            childcategory: "",
            childcategories: [],
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios
                .get("/api/category")
                .then(response => {
                    this.categories = response.data;
                })

        },
        getSubcategories() {
            axios
                .get("/api/subcategory", {
                    params: { category_id: this.category }
                })
                .then(response => {
                    this.subcategories = response.data;
                })
        },
        getChildcategories() {
            axios
                .get("/api/childcategory", {
                    params: { subcategory_id: this.subcategory }
                })
                .then(response => {
                    this.childcategories = response.data;
                })
        }
    }
};
</script>

<style></style>
