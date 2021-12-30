<template>
  <div>
    <el-row class="tac">
      <el-col :span="2">
        <LeftNav :span="2"></LeftNav>
      </el-col>
      <el-col :span="22">
        <div class="content">
          <div class="board"></div></div></el-col
    ></el-row>
  </div>
</template>

<script>
import LeftNav from "../components/LeftNav.vue";
export default {
  components: {
    LeftNav,
  },
};
</script>

<style>
</style>