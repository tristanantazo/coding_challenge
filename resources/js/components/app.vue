<template>
  <div class="app-container">
      <Nav/>
      <Dashboard/>
  </div>
</template>

<script>
import Nav from './nav';
import Dashboard from './dashboard';
export default {
    components: {Nav, Dashboard},
}
</script>

<style lang="scss" scoped>
    .app-container {
        width: 100%;
        height: 100%;
    }
</style>