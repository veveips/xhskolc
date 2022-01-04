<template>
  <div>
    <el-tabs tab-position="left" class="tabheader">
      <el-tab-pane label="商品列表">
        <div class="content">
          <div class="board">
            <el-breadcrumb separator-class="el-icon-arrow-right" inline="true">
              <el-breadcrumb-item>商品管理</el-breadcrumb-item>
              <el-breadcrumb-item>商品列表</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>
            <el-form
              size="medium"
              :model="goodsForm"
              class="goods-form"
              label-width="80px"
              label-position="left"
            >
              <el-form-item label="商品名称" class="goods-item">
                <el-input
                  class="goods-input"
                  v-model="goodsForm.name"
                  placeholder="请输入商品名称"
                ></el-input>
              </el-form-item>
              <el-form-item label="商品ID" class="goods-item">
                <el-input
                  class="goods-input"
                  v-model="goodsForm.id"
                  placeholder="请输入商品ID"
                ></el-input>
              </el-form-item>
              <el-form-item label="店铺名称" class="goods-item">
                <el-input
                  class="goods-input"
                  v-model="goodsForm.shopName"
                  placeholder="请输入店铺名称"
                ></el-input>
              </el-form-item>
              <el-form-item label="推广状态" class="goods-item">
                <el-select
                  class="goods-input"
                  v-model="goodsForm.status"
                  placeholder="请选择推广状态"
                >
                  <el-option label="状态一" value="zhuangtai0"></el-option>
                  <el-option label="状态二" value="zhuangtai1"></el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="商品类目" class="goods-item">
                <el-select
                  class="goods-input"
                  v-model="goodsForm.status"
                  placeholder="请选择商品类目"
                >
                  <el-option label="状态一" value="zhuangtai0"></el-option>
                  <el-option label="状态二" value="zhuangtai1"></el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="佣金率" class="goods-item">
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.minCommission"
                  placeholder="最小值"
                ></el-input>
                至
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.maxCommission"
                  placeholder="最大值"
                ></el-input>
              </el-form-item>
              <el-form-item label="直播价" class="goods-item">
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.minLivePrice"
                  placeholder="最小值"
                ></el-input>
                至
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.maxLivePrice"
                  placeholder="最大值"
                ></el-input>
              </el-form-item>
              <el-form-item label="现售价" class="goods-item">
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.minPrice"
                  placeholder="最小值"
                ></el-input>
                至
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.maxPrice"
                  placeholder="最大值"
                ></el-input>
              </el-form-item>
              <el-form-item label="服务费率" class="goods-item">
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.minServiceRate"
                  placeholder="最小值"
                ></el-input>
                至
                <el-input
                  class="goods-limit"
                  v-model="goodsForm.maxServiceRate"
                  placeholder="最大值"
                ></el-input>
              </el-form-item>
              <el-form-item label="团长活动" class="goods-limit">
                <el-input
                  v-model="goodsForm.activities"
                  placeholder="请输入团长活动名称"
                ></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary">筛选</el-button>
                <el-button>清空</el-button>
              </el-form-item>
            </el-form>
            <div class="divider"><el-divider></el-divider></div>
            <div class="tabs">
              <el-tabs v-model="activeName">
                <el-tab-pane label="抖音" name="douyin">抖音</el-tab-pane>
                <el-tab-pane label="快手" name="kuaishou">快手</el-tab-pane>
                <el-tab-pane tap-position="right" label="回收站"
                  >回收站</el-tab-pane
                >
              </el-tabs>
            </div>
          </div>
        </div></el-tab-pane
      >
      <el-tab-pane label="商品录入">商品录入</el-tab-pane>
      <el-tab-pane label="匹配达人">匹配达人</el-tab-pane>
    </el-tabs>
  </div>
</template>

<script>
export default {
  name: "Goods",
  components: {},
  data() {
    return {
      activeName: "douyin",
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
