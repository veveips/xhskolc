<template>
  <div id="app">
    <NavMenu></NavMenu>
    <router-view />
  </div>
</template>

<script>
import NavMenu from "./components/NavMenu.vue";
export default {
  components: {
    NavMenu,
  },
};
</script>


<style lang="less">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
body {
  margin: 0;
}
.tac {
  .el-menu-item {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
  }
  .el-menu-vertical-demo {
    height: calc(100vh - 61px);
  }
}
.content {
  overflow: hidden;
  .board {
    overflow: hidden;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin: 10px;
    border-radius: 4px;
    height: calc(100vh - 81px);
    .el-breadcrumb {
      padding: 12px;
    }
    .el-divider {
      margin: 0;
    }
  }
}
</style>
