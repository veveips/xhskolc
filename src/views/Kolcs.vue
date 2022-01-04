<template>
  <div>
    <el-tabs tab-position="left" class="tabheader">
      <el-tab-pane label="达人列表">
        <div class="content">
          <div class="board">
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item>达人管理</el-breadcrumb-item>
              <el-breadcrumb-item>达人列表</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>
            <Kolcsearch style="margin-top: 15px"></Kolcsearch>
            <el-tabs
              style="padding: 0 15px"
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

            <el-table :data="tableData" id="kolctabs" class="el-table">
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
        </div></el-tab-pane
      >
      <el-tab-pane label="录入达人">
        <div class="content">
          <div class="board">
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item>达人管理</el-breadcrumb-item>
              <el-breadcrumb-item>录入达人</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>
            <div class="k-upload">
              <input
                id="excel"
                type="file"
                style="display: none"
                accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                @change="handleFileChange($event)"
                multiple
              />
              <!-- accept="application/vnd.ms-excel" -->
              <el-button type="primary" @click="uploadExcel"
                ><i class="el-icon-edit-outline"></i>导入Excel表格</el-button
              >
              <el-link
                :underline="false"
                icon="el-icon-edit"
                type="primary"
                style="margin: 0 15px"
                ><a
                  class="downexcel"
                  href="http://localhost/api/达人模板.xlsx"
                  download="达人模板.xlsx"
                  >下载表格模板</a
                ></el-link
              >
            </div>
            <el-divider></el-divider>

            <el-steps :active="4" align-center style="margin: 50px 0">
              <el-step
                title="注意1"
                description="手动导入达人表格,需按表格模板填写"
              >
              </el-step>
              <el-step
                title="注意2"
                description="多种不同格式excel可下载工具统一上传格式"
              ></el-step>
              <el-step
                title="注意3"
                description="达人模板固定的A-G列表头不可修改"
              ></el-step>
              <el-step
                title="注意4"
                description="上传后可在达人管理页进行操作"
              ></el-step>
            </el-steps>

            <el-divider></el-divider>

            <el-table
              :data="excellist"
              id="uptabs"
              style="padding: 0 20px; width: 100%"
              :row-class-name="tableRowClassName"
            >
              <el-table-column prop="name" label="文件名"> </el-table-column>
              <el-table-column prop="type" label="类型"> </el-table-column>
              <el-table-column prop="size" label="大小"> </el-table-column>
              <el-table-column prop="state" label="状态"> </el-table-column>
              <el-table-column prop="brief" label="备注"> </el-table-column>
            </el-table>
          </div></div
      ></el-tab-pane>
      <el-tab-pane label="发布表单">发布表单</el-tab-pane>
      <el-tab-pane label="表单数据">表单数据</el-tab-pane>
      <el-tab-pane label="录入表单">录入表单</el-tab-pane>
      <el-tab-pane label="匹配达人"
        >匹配达人
        <el-button @click="tianbiao">填表</el-button>
      </el-tab-pane>
    </el-tabs>
  </div>
</template>

<script>
import Kolcsearch from "../components/Kolcsearch.vue";
export default {
  components: {
    Kolcsearch,
  },
  mounted() {
    // for (let i = 0; i < 10; i++) {
    //   this.excellist.push({
    //     name: i,
    //     size: "file.size",
    //     type: "filetype",
    //     state: "上传成功",
    //   });
    // }

    // this.$axios
    //   .get("http://f45s7orn6nq1ftav.mikecrm.com/rEzJN6h")
    //   .then(function (e) {
    //     console.log(e.data);
    //   });

    let _this = this;
    setTimeout(() => {
      let tab1 = document.getElementById("kolctabs");
      let h1 = tab1.offsetTop + 73;
      tab1.style.height = "calc(100vh - " + h1 + "px)";

      let tab2 = document.getElementById("uptabs");
      let h2 = tab2.offsetTop + 400;
      tab2.style.height = "calc(100vh - " + h2 + "px)";
    });

    this.$axios.get("http://localhost/api/getkolcs.php").then(function (e) {
      _this.tableData = e.data;
    });
  },
  data() {
    return {
      activeName: "first",
      tableData: [],
      excellist: [],
    };
  },
  methods: {
    async tianbiao() {
      let xhsdata = {
        d: {
          cvs: {
            i: 200662025,
            t: "rEzJN6h",
            s: 201652329,
            acc: "tAXWUhA6meaGYvZwjzZaDigMC1CBVZUs",
            r: "http://f45s7orn6nq1ftav.mikecrm.com/rEzJN6h",
            fc: "55f3AC5pRS2U55u0Fe",
            c: {
              cp: {
                206199405: "小红书昵称",
                206199406: "小红书主页",
                206199407: "小红书粉丝",
                206199408: "小红书点赞",
                206199409: "小红书类型",
                206199410: "小红书微信",
                206199411: "小红书电话",
                206199412: "小红书ID",
                206199413: "小红书性别",
                206199414: "小红书价格",
                206199415: "小红书是否授权",
                206199416: "小红书地址",
                206199417: "小红书kpl",
              },
            },
          },
        },
      };
      await this.$axios
        .post(
          "http://f45s7orn6nq1ftav.mikecrm.com/handler/web/form_runtime/handleSubmit.php",
          xhsdata
        )
        .then(function (e) {
          console.log(e.data);
        });
    },
    tableRowClassName({ row }) {
      if (row.state == "上传失败") {
        return "warning-row";
      }
      return "";
    },
    handleFileChange(e) {
      for (let i = 0; i < e.target.files.length; i++) {
        let file = e.target.files[i];
        let filetype = file.name;
        filetype = filetype.substring(
          filetype.lastIndexOf(".") + 1,
          filetype.length
        );
        if (
          file.type != "application/vnd.ms-excel" &&
          file.type !=
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
        ) {
          this.excellist.push({
            name: file.name,
            size: file.size,
            type: filetype,
            state: "上传失败",
            brief: "类型错误",
          });
          // this.$alert("格式错误", "提示", { confirmButtonText: "确定" });
          continue;
        }
        let _this = this;
        var formdata = new FormData();
        formdata.append("file", file);
        formdata.append("type", filetype);
        this.$axios
          .post("http://localhost/api/uploadexcel.php", formdata)
          .then(function (e) {
            _this.excellist.push(e.data);
          });
      }
    },
    uploadExcel() {
      document.getElementById("excel").click();
    },
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
  // padding: 0 12px;
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
.k-upload {
  display: flex;
  padding: 20px;
  .downexcel {
    color: #409eff;
    text-decoration: none;
  }
}
</style>