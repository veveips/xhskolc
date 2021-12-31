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
  name: "Goods",
  components: {
    LeftNav,
  },
  data() {
    return {
      goodsForm: {
        name: "",
        id: "",
        shopName: "",
        status: "",
        minCommission: "",
        maxCommission: "",
      },
    };
  },
};
</script>



<style lang="less" scoped>
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
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    margin: 10px;
    border-radius: 4px;
    // height: calc(100vh - 81px);
    .el-breadcrumb {
      padding: 12px;
    }
    .el-divider {
      margin: 0;
    }
    .goods-form {
      margin: 20px 0 0 50px;
      width: 1200px;
      display: flex;
      flex-wrap: wrap;

      .goods-item {
        margin-right: 10px;
        .goods-input {
          width: 200px;
        }
        .goods-limit {
          width: 88px;
        }
      }
    }
    .divider {
      padding: 0 50px;
    }
    .tabs {
      margin: 0 50px;
    }
  }
}
</style>
