<?php

namespace SdifParser\Model;

use DateTime;
use JsonSerializable;

/**
 * 
 * @author ebeaule
 *
 */
class File implements JsonSerializable
{

    /**
     * 
     * @var string
     */
    private $path;
    
    /**
     * @var string
     */
    private $sdifVersion;
    
    /**
     * 
     * @var int
     */
    private $code;
    
    /**
     * 
     * @var string
     */
    private $description;
    
    /**
     * 
     * @var string
     */
    private $software;
    
    /**
     * 
     * @var string
     */
    private $softwareVersion;
    
    /**
     * 
     * @var string
     */
    private $contact;
    
    
    /**
     * 
     * @var string
     */
    private $contactPhone;
    
    /**
     * 
     * @var string
     */
    private $date;
    
    
    public function getPath(): string {
        return $this->path;
    }
    
    public function setPath(string $value) {
        $this->path = $value;
    }
    
    public function getSdifVersion(): string {
        return $this->sdifVersion;
    }
    
    public function setSdifVersion(string $value) {
        $this->sdifVersion = $value;
    }
    
    public function getCode(): int {
        return $this->Code;
    }
    
    public function setCode(int $value) {
        $this->Code = $value;
        $this->setDescription($value);
    }
    
    public function getDescription(): string {
        return $this->description;
    }
    
    private function setDescription(int $code) {
        
        switch ($code) {
            case 1:
                $this->description = 'Meet Registrations';
                break;
            case 2:
                $this->description = 'Meet Results';
                break;
            case 3:
                $this->description = 'OVC';
                break;
            case 4:
                $this->description = 'National Age Group Record';
                break;
            case 5:
                $this->description = 'LSC Age Group Record';
                break;
            case 6:
                $this->description = 'LSC Motivational List';
                break;
            case 7:
                $this->description = 'National Records and Rankings';
                break;
            case 8:
                $this->description = 'Team Selection';
                break;
            case 9:
                $this->description = 'LSC Best Times';
                break;
            case 10:
                $this->description = 'USS Registration';
                break;
            case 16:
                $this->description = 'Top 16';
                break;
            case 20:
                $this->description = 'Vendor-defined code';
                break;
            default:
                $this->description = 'Unknown';
                break;
        }
    }
    
    public function getSoftware(): string {
        return $this->software;
    }
    
    public function setSoftware(string $value) {
        $this->software = utf8_encode($value);
    }
    
    public function getSoftwareVersion(): string {
        return $this->softwareVersion;
    }
    
    public function setSoftwareVersion(string $value) {
        $this->softwareVersion = $value;
    }
    
    public function getContact(): string {
        return $this->contact;
    }
    
    public function setContact(string $value) {
        $this->contact = utf8_encode($value);
    }
    
    public function getContactPhone(): string {
        return $this->contactPhone;
    }
    
    public function setContactPhone(string $value) {
        $this->contactPhone = $value;
    }
    
    public function getDate(string $format = 'Y-m-d'): string {
        return date_format($this->date, $format);
    }
    
    public function setDate(string $value) {
        $this->date = DateTime::createFromFormat('mdY', $value);
    }
    
    /*
    public function get(): string {
        return $this->;
    }
    
    public function set(string $value) {
        $this-> = $value;
    }
     */
    
    public function jsonSerialize() {
        return [
            'path' => $this->path,
            'sdifVersion' => $this->sdifVersion,
            'code' => $this->code,
            'description' => $this->description,
            'software' => $this->software,
            'softwareVersion' => $this->softwareVersion,
            'contact' => $this->contact,
            'contactPhone' => $this->contactPhone,
            'date' => $this->getDate()
        ];
    }
}