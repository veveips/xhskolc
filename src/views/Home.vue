<template>
  <div class="home">
    <el-row class="tac">
      <el-col :span="18">
        <div class="content">
          <div class="board">
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item :to="{ path: '/' }">首页</el-breadcrumb-item>
              <el-breadcrumb-item>我的工作台</el-breadcrumb-item>
            </el-breadcrumb>
            <el-divider></el-divider>
            <div class="user">
              <div class="user1">
                <el-avatar :size="50" :src="circleUrl"></el-avatar>
                <div class="user2">
                  <p>Hello! 用户名<span>欢迎回来！</span></p>
                  <p><i class="el-icon-s-custom"></i>公司组织</p>
                </div>
              </div>
              <div class="bg"></div>
            </div>
            <el-divider></el-divider>
            <div class="work">
              <p class="w-name"><i class="el-icon-loading"></i>待办事项</p>
              <el-row>
                <el-col
                  :span="6"
                  class="w-card"
                  v-for="(item, index) in 4"
                  :key="index"
                >
                  <div class="w-mark">
                    <p class="w-title">
                      建联阶段
                      <el-tooltip
                        class="item"
                        effect="dark"
                        content="Top Left 提示文字"
                        placement="top"
                      >
                        <i class="el-icon-warning-outline"></i>
                      </el-tooltip>
                    </p>
                    <li>
                      <p>未建联线索</p>
                      <span>35</span>
                    </li>
                    <li>
                      <p>未建联线索</p>
                      <span>35</span>
                    </li>
                    <li>
                      <p>未建联线索</p>
                      <span>35</span>
                    </li>
                  </div>
                </el-col>
              </el-row>
            </div>

            <el-divider></el-divider>
          </div>
        </div>
      </el-col>

      <el-col :span="6"
        ><div class="content">
          <div class="board" style="margin-left: 5px">
            <el-breadcrumb separator-class="el-icon-arrow-right">
              <el-breadcrumb-item>我的工作台</el-breadcrumb-item>
              <el-breadcrumb-item>公告通知</el-breadcrumb-item>
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
      circleUrl:
        "https://cube.elemecdn.com/3/7c/3ea6beec64369c2642b92c6726f1epng.png",
    };
  },
};
</script>

<style lang="less" scoped>
.user {
  height: 90px;
  display: flex;
  justify-content: space-between;
  overflow: hidden;
  .user1 {
    padding: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    .user2 {
      text-align: left;
      padding: 15px;
      p {
        margin: 0;
        span {
          padding-left: 4px;
          color: gray;
          font-style: oblique;
          font-size: 14px;
        }
        i {
          padding-right: 2px;
          font-size: 16px;
          color: orangered;
        }
      }
      p:nth-child(1) {
        font-size: 20px;
        font-weight: bold;
        span {
          font-weight: normal;
        }
      }
      p:nth-child(2) {
        font-size: 14px;
      }
    }
  }
  .bg {
    width: 320px;
    height: 90px;
    background-position: 0 -875px;
    background-image: url("../assets/xhsbg.png");
  }
}
.work {
  padding-bottom: 20px;
  .w-name {
    padding: 30px 0 10px 10px;
    display: flex;
    align-items: center;
    font-weight: bold;
    margin: 0;
    i {
      margin-right: 8px;
      font-size: 20px;
    }
  }
  .w-card {
    padding: 10px;
    .w-mark {
      border-radius: 4px;
      border: 1px #eee solid;
      // box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
      .w-title {
        font-weight: bold;
        text-align: left;
        margin: 0;
        background: rgb(222, 239, 255);
        padding: 10px;
        i {
          cursor: pointer;
          padding: 4px;
        }
      }
      li {
        font-size: 15px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        list-style: none;
        transition: all 0.3s;
        p,
        span {
          padding: 8px;
          margin: 0;
        }
        span {
          color: rgb(65, 128, 245);
        }
      }
      li:hover {
        color: rgb(65, 128, 245);
        background: rgb(243, 247, 255);
      }
    }
  }
}
</style>
