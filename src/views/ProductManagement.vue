<template>
  <div class="home">
    <el-row class="tac">
      <el-col :span="2">
        <el-menu
          default-active="2"
          class="el-menu-vertical-demo"
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
            <el-breadcrumb separator-class="el-icon-arrow-right" inline="true">
              <el-breadcrumb-item>商品管理</el-breadcrumb-item>
              <el-breadcrumb-item>商品库</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>
            <el-form size="medium" :model="goodsForm" class="goods-form" label-width="80px" label-position="left">
              <el-form-item label="商品名称" class="goods-item">
                <el-input class="goods-input" v-model="goodsForm.name" placeholder="请输入商品名称" ></el-input>
              </el-form-item>
              <el-form-item label="商品ID" class="goods-item">
                <el-input class="goods-input" v-model="goodsForm.id" placeholder="请输入商品ID" ></el-input>
              </el-form-item>
              <el-form-item label="店铺名称" class="goods-item">
                <el-input class="goods-input" v-model="goodsForm.shopName" placeholder="请输入店铺名称" ></el-input>
              </el-form-item>
              <el-form-item label="推广状态" class="goods-item">
                <el-select class="goods-input" v-model="goodsForm.status" placeholder="请选择推广状态">
                  <el-option label="状态一" value="zhuangtai0"></el-option>
                  <el-option label="状态二" value="zhuangtai1"></el-option>
                </el-select>
              </el-form-item>
               <el-form-item label="商品类目" class="goods-item">
                <el-select class="goods-input" v-model="goodsForm.status" placeholder="请选择商品类目">
                  <el-option label="状态一" value="zhuangtai0"></el-option>
                  <el-option label="状态二" value="zhuangtai1"></el-option>
                </el-select>
              </el-form-item>
              <el-form-item label="佣金率" class="goods-item">
                <el-input class="goods-limit" v-model="goodsForm.minCommission" placeholder="最小值" ></el-input>
                至 
                <el-input class="goods-limit" v-model="goodsForm.maxCommission" placeholder="最大值" ></el-input>
              </el-form-item>
              <el-form-item label="直播价" class="goods-item">
                <el-input class="goods-limit" v-model="goodsForm.minLivePrice" placeholder="最小值" ></el-input>
                至 
                <el-input class="goods-limit" v-model="goodsForm.maxLivePrice" placeholder="最大值" ></el-input>
              </el-form-item>
              <el-form-item label="现售价" class="goods-item">
                <el-input class="goods-limit" v-model="goodsForm.minPrice" placeholder="最小值" ></el-input>
                至 
                <el-input class="goods-limit" v-model="goodsForm.maxPrice" placeholder="最大值" ></el-input>
              </el-form-item>
              <el-form-item label="服务费率" class="goods-item">
                <el-input class="goods-limit" v-model="goodsForm.minServiceRate" placeholder="最小值" ></el-input>
                至 
                <el-input class="goods-limit" v-model="goodsForm.maxServiceRate" placeholder="最大值" ></el-input>
              </el-form-item>
              <el-form-item label="团长活动" class="goods-limit">
                <el-input v-model="goodsForm.activities" placeholder="请输入团长活动名称"></el-input>
              </el-form-item>
              <el-form-item>
                <el-button type="primary">筛选</el-button>
                <el-button>清空</el-button>
              </el-form-item>
            </el-form>
            <div class="divider"><el-divider ></el-divider></div>
            <div class="tabs">
              <el-tabs activate-name="douyin">
                <el-tab-pane label="抖音" name="douyin">抖音</el-tab-pane>
                <el-tab-pane label="快手" name="kuaishou">快手</el-tab-pane>
                <el-tab-pane tap-position="right" label="回收站" >回收站</el-tab-pane>
              </el-tabs>
            </div>
            <div class="goods-table">
              <div class="goods-table-action">
                <el-checkbox >当前全选</el-checkbox>
                <el-button>加入商品组</el-button>
                <el-button>同步商品</el-button>
                <span class="syncTime" >最近同步时间：</span>
              </div>
              <el-table
                ref="multipleTable"
                :data="goodsData"
                tooltip-effect="dark"
                style="width: 100%"
                @selection-change="handleSelectionChange">
                <el-table-column
                  type="selection"
                  width="55">
                </el-table-column>
                <el-table-column
                  label="商品信息"
                  width="300"
                  prop="info"
                >
                </el-table-column>
                <el-table-column
                  prop="price"
                  label="现售价"
                >
                </el-table-column>
                <el-table-column
                  prop="reduction"
                  label="直降价"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="commissionRate"
                  label="佣金率"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="serviceRate"
                  label="服务费率"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="promotionInfo"
                  label="推广信息"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="source"
                  label="来源"
                  width="120"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="activitiesInfo"
                  label="活动信息"
                  width="120"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="remarks"
                  label="备注"
                  width="120"
                  show-overflow-tooltip>
                </el-table-column>
                <el-table-column
                  prop="action"
                  label="操作"
                  class="column-actions"
                >
                  <!-- 这里抽象出组件 -->
                  <template slot-scope="scope">
                    <div class="actions">
                      <div @click="handleEdit(scope.$index, scope.row)">关闭推广</div>
                      <div class="actions-activated">复制链接</div>
                      <div>编辑竞品机制</div>
                      <div>上传手卡</div>
                      <div class="actions-activated">查看详情</div>
                      <div>备注</div>
                    </div>
                  </template>
                </el-table-column>
              </el-table>
            </div>
          </div>

        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  name: "ProductManagement",
  components: {},
  data() {
    return {
      goodsForm: {
        name: '',
        id: '',
        shopName: '',
        status: '',
        minCommission: '',
        maxCommission: ''
      },
       goodsData: [{
          info: 'sb',
          price: '12',
          reduction: '10',
          commissionRate: '10%',
          serviceRate: '10%',
          promotionInfo: 'you is sb',
          source: 'none',
          activitiesInfo: 'infofinof',
          remarks: '无',
          action: ''
        }, {
          info: 'sb',
          price: '12',
          reduction: '10',
          commissionRate: '10%',
          serviceRate: '10%',
          promotionInfo: 'you is sb',
          source: 'none',
          activitiesInfo: 'infofinof',
          remarks: '无',
          action: ''
        },{
          info: 'sb',
          price: '12',
          reduction: '10',
          commissionRate: '10%',
          serviceRate: '10%',
          promotionInfo: 'you is sb',
          source: 'none',
          activitiesInfo: 'infofinof',
          remarks: '无',
          action: ''
        },{
          info: 'sb',
          price: '12',
          reduction: '10',
          commissionRate: '10%',
          serviceRate: '10%',
          promotionInfo: 'you is sb',
          source: 'none',
          activitiesInfo: 'infofinof',
          remarks: '无',
          action: ''
        },{
          info: 'sb',
          price: '12',
          reduction: '10',
          commissionRate: '10%',
          serviceRate: '10%',
          promotionInfo: 'you is sb',
          source: 'none',
          activitiesInfo: 'infofinof',
          remarks: '无',
          action: ''
        },],
        multipleSelection: []
      }
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
    .goods-table {
      margin: 0 50px;
      .goods-table-action {
        float: left;
        .el-checkbox {
          margin-right: 15px;
        }
        .syncTime {
          margin-left: 15px;
          color: #a8a8a8;
          font-size: 14px;
        }
      }
      .actions {
        color: #a8a8a8;
        font-size: 12px;
        text-align: right;
        .actions-activated {
          color: #409EFF;
        }
      }
    }
  }
}
</style>
