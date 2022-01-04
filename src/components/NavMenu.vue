<template>
  <div>
    <el-row>
      <el-col :span="21">
        <el-menu
          :default-active="activeName"
          class="el-menu-demo"
          mode="horizontal"
          @select="handleSelect"
        >
          <el-menu-item
            ><a class="home" href="/"
              ><img style="height: 28px" src="../assets/xhs.png" alt="" /></a
          ></el-menu-item>
          <el-menu-item index="/">我的工作台</el-menu-item>
          <el-menu-item index="/kolcs">达人管理</el-menu-item>
          <el-menu-item index="/goods">商品管理</el-menu-item>
          <el-menu-item index="/msgs">消息通知</el-menu-item>
          <el-menu-item index="/forms">订单管理</el-menu-item>
        </el-menu>
      </el-col>
      <el-col :span="3">
        <div class="login" v-if="login.name == undefined">
          <!-- ////////////////////////////登录面板///////////////////////////////// -->
          <el-button type="primary" @click="logvis = true" round
            >登录</el-button
          >
          <el-dialog title="登录" :visible.sync="logvis">
            <el-form :model="formlog">
              <el-form-item label="账号" :label-width="formLabelWidth">
                <el-input
                  v-model="formlog.user"
                  placeholder="请输入账号"
                  maxlength="12"
                  show-word-limit
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="密码" :label-width="formLabelWidth">
                <el-input
                  type="password"
                  placeholder="请输入密码"
                  v-model="formlog.pwd"
                  maxlength="12"
                  show-password
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-link>忘记密码 / 请联系管理员</el-link>
            </el-form>
            <div slot="footer" class="dialog-footer">
              <el-button @click="logvis = false">取 消</el-button>
              <el-button type="primary" @click="log">确 定</el-button>
            </div>
          </el-dialog>
          <!-- ////////////////////////////注册面板///////////////////////////////// -->
          <el-button type="success" @click="regvis = true" round
            >注册</el-button
          >
          <el-dialog title="注册" :visible.sync="regvis">
            <el-form :model="formreg">
              <el-form-item label="用户名" :label-width="formLabelWidth">
                <el-input
                  maxlength="12"
                  show-word-limit
                  v-model="formreg.name"
                  placeholder="请输入用户名"
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="账号" :label-width="formLabelWidth">
                <el-input
                  maxlength="12"
                  show-word-limit
                  v-model="formreg.user"
                  placeholder="请输入账号"
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="密码" :label-width="formLabelWidth">
                <el-input
                  maxlength="12"
                  type="password"
                  show-password
                  placeholder="请输入密码"
                  v-model="formreg.pwd"
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="确认密码" :label-width="formLabelWidth">
                <el-input
                  maxlength="12"
                  type="password"
                  show-password
                  placeholder="再次输入密码"
                  v-model="formreg.pwd2"
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="手机号码" :label-width="formLabelWidth">
                <el-input
                  maxlength="11"
                  show-word-limit
                  v-model="formreg.phone"
                  placeholder="请输入手机号码"
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="公司组织" :label-width="formLabelWidth">
                <el-input
                  maxlength="12"
                  show-word-limit
                  v-model="formreg.company"
                  placeholder="请输入公司组织"
                  autocomplete="off"
                ></el-input>
              </el-form-item>
              <el-form-item label="身份" :label-width="formLabelWidth">
                <el-select
                  v-model="formreg.ide"
                  style="width: 100%"
                  placeholder="请选择身份"
                >
                  <el-option label="达人商务" value="达人商务"></el-option>
                  <el-option label="游客" value="游客"></el-option>
                </el-select>
              </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer">
              <el-button @click="regvis = false">取 消</el-button>
              <el-button type="primary" @click="reg">确 定</el-button>
            </div>
          </el-dialog>
        </div>
        <el-menu
          class="el-menu-demo menu2"
          mode="horizontal"
          v-if="login.name != undefined"
        >
          <el-menu-item
            ><div class="avatar">
              <el-avatar :size="36" :src="circleUrl"></el-avatar>
              <el-dropdown @command="handleClick">
                <span class="el-dropdown-link">
                  {{ login.name }}<span class="ide">{{ login.ide }}</span>
                  <i class="el-icon-arrow-down el-icon--right"></i>
                </span>
                <el-dropdown-menu slot="dropdown">
                  <el-dropdown-item command="change" icon="el-icon-user-solid"
                    >修改资料</el-dropdown-item
                  >
                  <el-dropdown-item command="logout" icon="el-icon-error"
                    >退出登录</el-dropdown-item
                  >
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
import qs from "qs";
export default {
  name: "NavMenu",
  data() {
    return {
      logvis: false,
      regvis: false,
      formlog: {
        user: "",
        pwd: "",
      },
      formreg: {
        name: "",
        user: "",
        pwd: "",
        pwd2: "",
        company: "",
        phone: "",
        ide: "",
      },
      formLabelWidth: "120px",
      login: { id: undefined, name: undefined, ide: undefined },
      circleUrl:
        "https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png",
      activeName: "/",
    };
  },
  mounted() {
    let curnav = window.location.pathname;
    this.activeName = curnav;
    let _this = this;
    this.$axios
      .post(
        "/app",
        qs.stringify({
          action: "getlogin",
        })
      )
      .then(function (e) {
        if (e.data != "") {
          _this.login = e.data;
          setTimeout(() => {
            let ide = document.getElementsByClassName("ide")[0];
            switch (e.data.ide) {
              case "达人商务":
                ide.className = "ide ide-bus";
                break;
              case "管理员":
                ide.className = "ide ide-admin";
                break;
              case "游客":
                ide.className = "ide ide-cus";
                break;
              default:
                break;
            }
          });
        }
      });
  },
  methods: {
    handleClick(com) {
      if (com == "logout") {
        let _this = this;
        this.$axios
          .post("/app", qs.stringify({ action: "logout" }))
          .then(function (e) {
            if (e.data == "ok") {
              _this.$router.go(0);
            }
          });
      }
      // console.log(com);
    },
    log() {
      if (this.formlog.user == "" || this.formlog.pwd == "") {
        this.$message.error("不能为空");
        return;
      }
      let _this = this;
      this.$axios
        .post(
          "/app",
          qs.stringify({
            action: "login",
            user: this.formlog.user,
            pwd: this.formlog.pwd,
          })
        )
        .then(function (e) {
          if (e.data != "") {
            _this.$router.go(0);
          } else {
            _this.$message.error("账号密码不匹配");
          }
        });
    },
    reg() {
      if (
        this.formreg.name == "" ||
        this.formreg.user == "" ||
        this.formreg.pwd == "" ||
        this.formreg.pwd2 == "" ||
        this.formreg.phone == "" ||
        this.formreg.company == "" ||
        this.formreg.ide == ""
      ) {
        this.$message.error("不能为空");
        return;
      } else if (
        this.formreg.name.length < 5 ||
        this.formreg.user.length < 5 ||
        this.formreg.phone.length < 5 ||
        this.formreg.company.length < 2 ||
        this.formreg.pwd.length < 5 ||
        this.formreg.pwd2.length < 5
      ) {
        this.$message.error("长度不能小于5");
        return;
      } else if (this.formreg.pwd != this.formreg.pwd2) {
        this.$message.error("两次输入的密码不匹配");
        return;
      } else if (!/^1[34578]\d{9}$/.test(this.formreg.phone)) {
        this.$message.error("电话号码格式不正确");
        return;
      }
      let _this = this;
      this.$axios
        .post(
          "/app",
          qs.stringify({
            action: "register",
            name: this.formreg.name,
            user: this.formreg.user,
            pwd: this.formreg.pwd,
            company: this.formreg.company,
            phone: this.formreg.phone,
            ide: this.formreg.ide,
          })
        )
        .then(function (e) {
          if (e.data.id != undefined) {
            _this.regvis = false;
            _this.formreg = {
              name: "",
              user: "",
              pwd: "",
              company: "",
              phone: "",
              ide: "",
            };
          } else {
            _this.$message.error(e.data);
          }
        });
    },
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
      this.$router.push(key);
    },
  },
};
</script>
<style lang="less" scoped>
.ide {
  font-weight: bold;
  margin-left: 4px;
  padding: 4px;
  border-radius: 15%;
}
.ide-bus {
  color: rgb(2, 211, 2);
  background: rgba(6, 228, 6, 0.2);
}
.ide-admin {
  color: rgb(0, 195, 255);
  background: rgba(8, 139, 226, 0.2);
}
.ide-cus {
  color: rgb(250, 137, 31);
  background: rgba(160, 72, 0, 0.2);
}
.login {
  height: 60px;
  display: flex;
  justify-content: center;
  align-items: center;
  button {
    padding: 6px 12px;
    margin: 4px;
  }
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
    padding-left: 5px;
  }
}
.el-dropdown-menu {
  padding: 0;
}
</style>