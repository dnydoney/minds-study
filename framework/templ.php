<?php

class Template
{
    
    var $_var           = array();

    function __construct()
    {
        $this->APP_TMPL_PATH();
    }

    function APP_TMPL_PATH()
    {
        header('Content-type: text/html; charset=utf-8');
    }

    /**
     * 处理模板文件
     *
     * @access  public
     * @param   string      $filename
     * @param   sting      $cache_id
     *
     * @return  sring
     */
    function fetch($filename)
    {
        $out = $this->_eval($this->fetch_str(file_get_contents($filename)));
        
        return $out; // 返回html数据
    }

    /**
     * 显示页面函数
     *
     * @access  public
     * @param   string      $filename
     * @param   sting      $cache_id
     *
     * @return  void
     */
    function display($filename)
    {

        $out = $this->fetch($filename);     
        $this->gzip_out($out);        
     
    }
    
   
    /**
     * 处理字符串函数
     *
     * @access  public
     * @param   string     $source
     *
     * @return  sring
     */
    function fetch_str($source)
    {
        return preg_replace("/{([^\}\{\n]*)}/e", "\$this->select('\\1');", $source);
    }


     /**
     * 处理{}标签
     *
     * @access  public
     * @param   string      $tag
     *
     * @return  sring
     */
    function select($tag)
    {
        $tag = stripslashes(trim($tag));

        if (empty($tag))
        {
            return '{}';
        }
        elseif ($tag{0} == '*' && substr($tag, -1) == '*') // 注释部分
        {
            return '';
        }
        elseif ($tag{0} == '$') // 变量
        {
            return '<?php echo ' . $this->get_val(substr($tag, 1)) . '; ?>';
        }
        else
        {
            $tag_arr=explode(' ', $tag);
            $tag_sel = array_shift($tag_arr);
            if($tag_sel == "function") {
               
            }                    
         
        }
    }



    function _eval($content)
    {
        ob_start();
        eval('?' . '>' . trim($content));
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }


    function gzip_out($content)
    {
        header("Content-type: text/html; charset=utf-8");
        header("Cache-control: private");  //支持页面回跳
        echo $content;     
        
    }


}

?>