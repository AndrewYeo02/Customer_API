<template lang="">
   <div class="card mt-4">
        <img class="card-img-top">
        <div class="card-body">
            <h4 class="card-title"> {{title}}</h4>
            <p class="card-text">{{version}}</p>
   </div>
</template>
<script>
export default {
    setup: ()=>({
        title: "Hello from laravel 9 abd Vue.js",
        version : version
    })
}
</script>
