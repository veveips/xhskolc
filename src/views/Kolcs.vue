<template>
  <div>
    <el-row class="tac">
      <el-col :span="2">
        <LeftNav :span="2"></LeftNav>
      </el-col>
      <el-col :span="22">
        <div class="content">
          <div class="board">
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
              <el-breadcrumb-item>达人管理</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>
            <Kolcsearch style="margin-top: 15px"></Kolcsearch>
            <el-tabs
              ref="tabs"
              class="el-tabs"
              v-model="activeName"
              @tab-click="handleClick"
            >
              <el-tab-pane label="线索" name="first"></el-tab-pane>
              <el-tab-pane label="已建联" name="second"></el-tab-pane>
              <el-tab-pane label="已申样" name="third"></el-tab-pane>
              <el-tab-pane label="已提交" name="fourth"></el-tab-pane>
              <el-tab-pane label="已失效" name="five"></el-tab-pane>
            </el-tabs>

            <el-divider></el-divider>

            <el-table :data="tableData" ref="tabs2" class="el-table">
              <el-table-column type="expand">
                <template slot-scope="props">
                  <el-form
                    label-position="left"
                    inline
                    class="demo-table-expand"
                  >
                    <el-form-item label="商品名称">
                      <span>{{ props.row.name }}</span>
                    </el-form-item>
                    <el-form-item label="达人 ID">
                      <span>{{ props.row.aid }}</span>
                    </el-form-item>
                    <el-form-item label="主推类目">
                      <span>{{ props.row.cates }}</span>
                    </el-form-item>
                    <el-form-item label="粉丝数">
                      <span>{{ props.row.fans }}</span>
                    </el-form-item>
                    <el-form-item label="简介">
                      <span>{{ props.row.brief }}</span>
                    </el-form-item>
                    <el-form-item label="带货数据">
                      <span>{{ props.row.infos }}</span>
                    </el-form-item>
                    <el-form-item label="创建时间">
                      <span>{{ props.row.date }}</span>
                    </el-form-item>
                  </el-form>
                </template>
              </el-table-column>
              <el-table-column label="达人信息" prop="name"> </el-table-column>
              <el-table-column label="主推类目" prop="cates"> </el-table-column>
              <el-table-column label="带货数据" prop="infos"> </el-table-column>
              <el-table-column label="简介" prop="brief"> </el-table-column>
              <el-table-column label="创建时间" prop="date"> </el-table-column>
              <el-table-column label="操作" prop="option">
                <template slot-scope="scope">
                  <el-button
                    size="mini"
                    @click="handleEdit(scope.$index, scope.row)"
                    >编辑</el-button
                  >
                  <el-button
                    size="mini"
                    type="danger"
                    @click="handleDelete(scope.$index, scope.row)"
                    >删除</el-button
                  >
                </template>
              </el-table-column>
            </el-table>
          </div>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<script>
import LeftNav from "../components/LeftNav.vue";
import Kolcsearch from "../components/Kolcsearch.vue";
export default {
  components: {
    LeftNav,
    Kolcsearch,
  },
  mounted() {
    let _this = this;
    let tabh =
      this.$refs.tabs.$el.offsetHeight + this.$refs.tabs.$el.offsetTop + 20;
    this.$refs.tabs2.$el.style.height = "calc(100vh - " + tabh + "px )";
    this.$axios.get("http://127.0.0.1/api/getkolcs.php").then(function (e) {
      _this.tableData = e.data;
    });
  },
  data() {
    return {
      activeName: "first",
      tableData: [],
    };
  },
  methods: {
    handleClick(tab, event) {
      console.log(tab, event);
    },
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      console.log(index, row);
      this.$confirm("此操作将永久删除该文件, 是否继续?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(() => {
          this.$message({
            type: "success",
            message: "删除成功!",
          });
        })
        .catch(() => {
          this.$message({
            type: "info",
            message: "已取消删除",
          });
        });
    },
  },
};
</script>

<style lang="less" scoped>
.el-tabs {
  padding: 0 12px;
}
.el-table {
  width: 100%;
  // height: 50vh;
  overflow-y: auto;
}
.demo-table-expand {
  font-size: 0;
  padding: 0 50px;
  background: rgb(250, 250, 250);
}
.demo-table-expand label {
  width: 90px;
}
.demo-table-expand .el-form-item {
  margin-right: 0;
  margin-bottom: 0;
  width: calc(100% / 3);
}
</style>