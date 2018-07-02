<?php
namespace Len\SmsExtend\Traits;

/**
 * http 请求
 *
 * @authors chenfeng (wangchenfeng@xdqcjy.com)
 * @date    2018-06-20 11:00:38
 * @version V1
 */
trait HasHttpRequest
{
    /**
     * get request
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @param string $url 请求地址
     * @param array $query 查询数据
     * @param array $headers 头部信息
     * @return array
     */
    protected function get(string $url, array $query = [], array $headers = [])
    {
        return $this->request('get', $url, [
            'headers' => $headers,
            'query'   => $query,
        ]);
    }

    /**
     * post request
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @param string $url 请求地址
     * @param array $params 查询数据
     * @param array $headers 头部信息
     * @return array
     */
    protected function post(string $url, array $params = [], array $headers = [])
    {
        return $this->request('post', $url, [
            'headers'     => $headers,
            'form_params' => $params,
        ]);
    }

    /**
     * post json request
     *
     * @author chenfeng (wangchenfeng@xdqcjy.com)
     * @date 2018-06-20
     * @param string $url 请求地址
     * @param array $params 查询数据
     * @param array $headers 头部信息
     * @return array
     */
    protected function postJson(string $url, array $params = [], array $headers = [])
    {
        $headers['Content-Type'] = 'application/json';

        return $this->request('post', $url, [
            'headers' => $headers,
            'json'    => $params,
        ]);
    }

    /**
     * http request.
     *
     * @param string $method 请求方式
     * @param string $url 请求地址
     * @param array  $options 请求数据
     * @return array
     */
    protected function request(string $method, string $url, array $options = [])
    {
        $client   = new \GuzzleHttp\Client();
        $response = $client->request($method, $url, $options);
        if ($response->getStatusCode() != 200) {
            return [];
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
