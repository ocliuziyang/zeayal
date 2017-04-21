<template>
    <input type="file" name="file" @change="upload">
</template>

<script>
    export default {
        methods: {
            upload () {
                var file = window.document.getElementsByName('file');
                console.log(file);
                var formData = new FormData();
                formData.append('file', )
            }
        }
    }
</script>