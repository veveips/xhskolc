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
        <el-menu class="el-menu-demo menu2" mode="horizontal">
          <el-menu-item
            ><div class="avatar">
              <el-avatar :size="36" :src="circleUrl"></el-avatar>
              <el-dropdown>
                <span class="el-dropdown-link">
                  用户名<span class="ide">达人商务</span>
                  <i class="el-icon-arrow-down el-icon--right"></i>
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
    };
  },
  mounted() {
    let curnav = window.location.pathname;
    console.log(curnav);
  },
  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
      if (key == 1) {
        this.$router.push("/");
      } else if (key == 2) {
        this.$router.push("/kolcs");
      } else if (key == 3) {
        this.$router.push("/goods");
      } else if (key == 4) {
        this.$router.push("/msgs");
      } else if (key == 5) {
        this.$router.push("/forms");
      }
    },
  },
};
</script>
<style lang="less" scoped>
.ide {
  font-weight: bold;
  color: rgb(2, 211, 2);
  background: rgba(6, 228, 6, 0.2);
  margin-left: 4px;
  padding: 4px;
  border-radius: 15%;
}
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
  display: flex;
  justify-content: center;
  align-items: center;
  .el-dropdown {
    line-height: 0;
    padding-left: 10px;
  }
}
.el-dropdown-menu {
  padding: 0;
}
</style>