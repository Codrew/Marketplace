<template>
    <div>
        <input
            type="file"
            name="second_image"
            @change="onFileChange"
            class="custom-file-upload"
            accept="image/*"
        />
        <div id="preview" class="mt-2">
            <img v-if="url" :src="url" width="100" height="60" />
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            url: "",
        };
    },
    methods: {
        onFileChange(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
};
</script>

<style>
</style>
