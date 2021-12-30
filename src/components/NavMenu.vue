<template>
  <div>
    <el-row>
      <el-col :span="21">
        <el-menu
          :default-active="activeIndex"
          class="el-menu-demo"
          mode="horizontal"
          @select="handleSelect"
        >
          <el-menu-item
            ><a class="home" href="/"
              ><img style="height: 28px" src="../assets/xhs.png" alt="" /></a
          ></el-menu-item>
          <el-menu-item index="1">我的工作台</el-menu-item>
          <el-menu-item index="2">达人管理</el-menu-item>
          <el-menu-item index="3">商品管理</el-menu-item>
          <el-menu-item index="4">消息通知</el-menu-item>
          <el-menu-item index="5">订单管理</el-menu-item>
        </el-menu>
      </el-col>
      <el-col :span="3">
        <el-menu
          :default-active="activeIndex"
          class="el-menu-demo menu2"
          mode="horizontal"
        >
          <el-menu-item
            ><div class="avatar">
              <el-avatar :size="36" :src="circleUrl"></el-avatar>
              <el-dropdown>
                <span class="el-dropdown-link">
                  用户名<i class="el-icon-arrow-down el-icon--right"></i>
                </span>
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item icon="el-icon-user-solid"
                    >登录</el-dropdown-item
                  >
                  <el-dropdown-item icon="el-icon-error">退出</el-dropdown-item>
                </el-dropdown-menu>
              </el-dropdown>
            </div>
          </el-menu-item>
        </el-menu>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: "NavMenu",
  props: {
    msg: String,
  },
  data() {
    return {
      circleUrl:
        "https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png",
      activeIndex: "1",
      activeIndex2: "1",
    };
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    },
  },
};
</script>
<style lang="less" scoped>
.el-menu {
  display: flex;
  align-items: center;
  .el-menu-item:nth-child(1) {
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
.menu2 {
  display: flex;
  justify-content: flex-end;
}

.avatar {
  .el-dropdown {
    line-height: 0;
    padding-left: 10px;
  }
}
.el-dropdown-menu {
  padding: 0;
}
</style>