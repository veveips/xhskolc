<template>
  <div class="home">
    <el-row class="tac">
      <el-col :span="2">
        <el-menu
          default-active="2"
          class="el-menu-vertical-demo"
          @open="handleOpen"
          @close="handleClose"
        >
          <el-menu-item index="1">
            <i class="el-icon-location"></i>
            <span slot="title">导航一</span>
          </el-menu-item>
          <el-menu-item index="2">
            <i class="el-icon-menu"></i>
            <span slot="title">导航二</span>
          </el-menu-item>
          <el-menu-item index="3">
            <i class="el-icon-document"></i>
            <span slot="title">导航三</span>
          </el-menu-item>
          <el-menu-item index="4">
            <i class="el-icon-setting"></i>
            <span slot="title">导航四</span>
          </el-menu-item>
        </el-menu>
      </el-col>
      <el-col :span="22">
        <div class="content">
          <div class="board">
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
              <el-breadcrumb-item>我的工作台</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>

          </div>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: "Home",
  components: {},
  methods: {
    handleOpen(key, keyPath) {
      console.log(key, keyPath);
    },
    handleClose(key, keyPath) {
      console.log(key, keyPath);
    },
  },
  data() {
    return {
      options: [
        {
          value: "选项1",
          label: "3C电器",
        },
        {
          value: "选项2",
          label: "美妆护肤",
        },
        {
          value: "选项3",
          label: "日用百货",
        },
        {
          value: "选项4",
          label: "母婴宠物",
        },
        {
          value: "选项5",
          label: "运动户外",
        },
      ],
      value1: [],
      value2: [],
    };
  },
};
</script>

<style lang="less" scoped>
</style>
