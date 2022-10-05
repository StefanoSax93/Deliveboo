<template>
    <div>

      <header>
        <TheNavbar></TheNavbar>
      </header>

      <main>
        <router-view></router-view>
      </main>
        
      <footer>
        <TheFooter></TheFooter>
      </footer>
    </div>
</template>

<script>
import TheFooter from '../components/TheFooter.vue';
import TheNavbar from '../components/TheNavbar.vue';

    export default{
    components: {  TheFooter, TheNavbar },
}
</script>