<template>
    <div>
        <HomeJumbotron></HomeJumbotron>
        <TheHomeMain></TheHomeMain>
        <PlateInfo></PlateInfo>
    </div>
</template>

<script>
    import HomeJumbotron from '../components/HomeJumbotron.vue';
    import PlateInfo from '../components/PlateInfo.vue';
    import TheHomeMain from '../components/TheHomeMain.vue'  
    export default{
        // qui dentro va inserito il file TheCategories di Anna
    components: {  HomeJumbotron, PlateInfo, TheHomeMain}

}
</script>