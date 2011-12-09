package com.alibaba.test;

import org.jtester.annotations.AutoBeanInject;
import org.jtester.annotations.SpringApplicationContext;
import org.jtester.annotations.SpringBeanByName;
import org.jtester.testng.JTester;
import org.testng.annotations.Test;

import com.alibaba.jtester.bo.IUserBo;
/**
 * JTesterӦ��ʾ��ϵͳ1:<br/>
 * ���һ�������ݿ����CRUD�Ĺ���<br/>
 * ��Ҫ���ܣ�<br/>
 * <li>�ò������õ����ݿ��滻spring������Դ</li>
 * <li>ת��spring�����ã��Ӷ���ȡ��ע���ʵ��</li>
 * <li>������ݿ�Ĳ����������лع�����</li>
 */
@SpringApplicationContext({"applicationContext.xml"})
@AutoBeanInject
public class TestCRUD extends JTester{

	@SpringBeanByName
	private IUserBo userBo;
	@Test
	public void testAddUser(){
		
		want.string(userBo.addUser()).isEqualTo("success");
	}
}
