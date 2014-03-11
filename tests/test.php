<?php
class testEthercalcClient extends PHPUnit_Framework_TestCase
{
    public function testUpdateCell()
    {
        $page = 'TestPage';
        $Client = new EthercalcClient();

        $cell['A1'] = array(
            'coord'              => 'A1',
            'datavalue'          => 'some-text',
            'datatype'           => 't',
            'formula'            => '',
            'valuetype'          => 't',
            'readonly'           => false,
            'nontextvalueformat' => 2, /* XXX what is this */
        );

        $res = $Client->update_cell($page, $cell);
        $this->assertTrue($res);

        $data = $Client->get_cell($page, 'A1');
        $this->assertArrayEquals($cell['A1'], $data);
    }

}
