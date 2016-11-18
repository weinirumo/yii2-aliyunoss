<?php

namespace weini\aliyun;

use weini\aliyun\OSS\OssClient;
use yii\base\Component;

class aliyunoss extends Component
{
    public $accessKeyId;
    public $accessSecret;
    public $durationSeconds;
    public $endPoint;
    public $defaultBucketName;

    /**
     * 上传文件
     * @param $objectName
     * @param $localFilePath
     * @param null $bucketName
     * @return null
     */
    public function uploadFile($objectName, $localFilePath, $bucketName = null)
    {
        $ossClient = new OssClient($this->accessKeyId, $this->accessSecret, $this->endPoint);
        $bucketName = $bucketName ? $bucketName : $this->defaultBucketName;

        return $ossClient->uploadFile($bucketName, $objectName, $localFilePath);
    }

    /**
     * 删除Object
     * @param $object
     * @param null $options
     * @param null $bucketName
     * @return null
     */
    public function deleteObject($object, $options = NULL, $bucketName = null)
    {
        $ossClient = new OssClient($this->accessKeyId, $this->accessSecret, $this->endPoint);
        $bucketName = $bucketName ? $bucketName : $this->defaultBucketName;
        return $ossClient->deleteObject($bucketName, $object, $options);
    }

    /**
     * 删除同一个Bucket中的多个Object
     *
     * @param $bucketName
     * @param array $objects object列表
     * @param array $options
     * @return ResponseCore
     */
    public function deleteObjects($objects, $options = null, $bucketName = null)
    {
        $ossClient = new OssClient($this->accessKeyId, $this->accessSecret, $this->endPoint);
        $bucketName = $bucketName ? $bucketName : $this->defaultBucketName;
        return $ossClient->deleteObjects($bucketName, $objects, $options);
    }
}