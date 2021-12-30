<template>
  <div>
    <el-row>
      <el-col class="search" :span="6">
        <span>达人昵称</span>
        <el-input v-model="input" placeholder="请输入达人昵称"></el-input>
      </el-col>
      <el-col class="search" :span="6">
        <span>小红书号</span>
        <el-input v-model="input" placeholder="请输入达人昵称"></el-input>
      </el-col>
      <el-col class="search" :span="6">
        <span>平台</span>
        <el-select style="width: 100%" v-model="value" placeholder="请选择">
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.value"
          >
          </el-option>
        </el-select>
      </el-col>
      <el-col class="search" :span="6">
        <span>粉丝量</span>
        <el-input v-model="input" placeholder="请输入达人昵称"></el-input>
      </el-col>
      <el-col class="search" :span="6">
        <span>主推类目</span>
        <el-select style="width: 100%" v-model="value2" placeholder="请选择">
          <el-option
            v-for="item in cates"
            :key="item.value"
            :label="item.label"
            :value="item.value"
          >
          </el-option>
        </el-select>
      </el-col>
      <el-col class="search" :span="6">
        <span>填表时间</span>
        <div class="block" style="width: 100%">
          <el-date-picker
            style="width: 100%"
            v-model="value1"
            type="date"
            placeholder="选择日期"
          >
          </el-date-picker>
        </div>
      </el-col>

      <el-col class="search" :span="12">
        <el-button type="primary" style="width: 100%">查询/过滤达人</el-button>
      </el-col>
    </el-row>
  </div>
</template>

<script>
export default {
  data() {
    return {
      input: "",
      value: "",
      value1: "",
      value2: "",
      options: [
        {
          value: "选项1",
          label: "小红书",
        },
        {
          value: "选项2",
          label: "抖音",
        },
      ],
      cates: [
        {
          value: "选项1",
          label: "3C电器",
        },
        {
          value: "选项2",
          label: "母婴宠物",
        },
        {
          value: "选项3",
          label: "美妆护肤",
        },
        {
          value: "选项4",
          label: "食品饮料",
        },
      ],
    };
  },
};
</script>

<style lang="less" scoped>
.search {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 14px;
  overflow: hidden;
  font-size: 14px;
  padding-bottom: 14px;
  span {
    white-space: nowrap;
    padding: 8px;
  }
}
</style>