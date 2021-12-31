<template>
  <div class="home">
    <el-row class="tac">
      <el-col :span="24">
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
